<?php

namespace Circle314\Component\Data\Accessor\Database\PostgreSQL;

use \Exception;
use \PDO;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalDeleteOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalInsertOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalSelectOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalUpdateOperationException;
use Circle314\Component\Data\Persistence\PersistenceConstants;
use Circle314\Component\Schema\Database\DatabaseTableSchemaInterface;
use Circle314\Component\Data\Accessor\Database\AbstractDatabaseAccessor;
use Circle314\Transitional\TransitionalDataEntityInterface;

/**
 * Class PostgreSQLDatabaseAccessor
 * @package Circle314\Component\Data
 * @method PostgreSQLDatabaseConfiguration configuration()
 */
class PostgreSQLDatabaseAccessor extends AbstractDatabaseAccessor
{
    /**
     * PostgreSQLDatabaseAccessor constructor.
     * @param $configuration PostgreSQLDatabaseConfiguration
     */
    final public function __construct(PostgreSQLDatabaseConfiguration $configuration)
    {
        parent::__construct($configuration);
    }

    #region Public methods
    /**
     * @return bool
     * @throws \Exception
     */
    public function connect() {
        if(is_null($this->configuration())) {
            throw new Exception('PostgreSQL Database Configuration not set');
        }

        // Only attempt to connect if a connection does not already exist
        if($this->PDO() === null) {
            // Attempt to connect
            $dsn = 'pgsql:host=' .
                $this->configuration()->getServerIP() .
                ($this->configuration()->getDatabaseName() ? ';dbname=' . $this->configuration()->getDatabaseName() : '')
            ;
            $this->setPDO(
                new PDO(
                    $dsn,
                    $this->configuration()->getUsername(),
                    $this->configuration()->getPassword(),
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
                        PDO::ATTR_EMULATE_PREPARES => true,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                )
            );
            $this->setIsConnectionEstablished(true);
        }

        if(!$this->isInTransaction()) {
            $this->beginTransaction();
        }

        return true;
    }

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     * @throws IllegalDeleteOperationException
     */
    public function generateDeleteQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null)
    {
        if(is_null($tableName)) {
            /** @var DatabaseTableSchemaInterface $dataEntity */
            if(!$dataEntity->deleteQueriesAllowed()) {
                throw new IllegalDeleteOperationException(
                    'SQL DELETE queries forbidden on table '
                    . $tableName
                );
            }
            $tableName = $this->getFullyQualifiedTableName($dataEntity, PersistenceConstants::WRITE);
        } else {
            $tableName = $this->delimitedFullyQualifiedTableName($schemaName, $tableName);
        }

        /** @var TransitionalDataEntityInterface $dataEntity */
        if(!$dataEntity->fieldsMarkedAsIdentifiers()->count()) {
            throw new IllegalDeleteOperationException('Cannot generate an SQL DELETE query without identifiers');
        }

        $query =
            'DELETE FROM '
            . $tableName
            . $this->generateWhereClauses($dataEntity)
            . ';'
        ;
        return $query;
    }

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @param null $schemaName
     * @param null $tableName
     * @return string
     * @throws IllegalInsertOperationException
     * @throws \Circle314\Component\Data\Mediator\Database\Exception\DatabaseDataPersistenceException
     */
    public function generateInsertQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null)
    {
        if(is_null($tableName)) {
            /** @var DatabaseTableSchemaInterface $dataEntity */
            if(!$dataEntity->insertQueriesAllowed())
            {
                throw new IllegalInsertOperationException(
                    'SQL INSERT queries forbidden on table '
                    . $this->getFullyQualifiedTableName($dataEntity, PersistenceConstants::WRITE)
                );
            }
            $tableName = $this->getFullyQualifiedTableName($dataEntity, PersistenceConstants::WRITE);
        } else {
            $tableName = $this->delimitedFullyQualifiedTableName($schemaName, $tableName);
        }

        /** @var TransitionalDataEntityInterface $dataEntity */
        if(!$dataEntity->fieldsMarkedForUpdate()->count())
        {
            throw new IllegalInsertOperationException('Cannot generate an SQL INSERT query without any updated fields');
        }

        $query =
            'INSERT INTO '
            . $tableName
        ;
        $columnNames = [];
        $boundValueNames = [];
        foreach($dataEntity->fieldsMarkedForUpdate() as $column)
        {
            $columnNames[] =
                $this->configuration()->openingIdentityDelimiter()
                . $column->fieldName()
                . $this->configuration()->closingIdentityDelimiter()
            ;
            $boundValueNames[] =
                $this->configuration()->writeParameterPrefix()
                . $column->fieldName()
            ;
        }
        $query .=
            '('
            . implode(', ', $columnNames)
            . ') VALUES ('
            . implode(', ', $boundValueNames)
            . ')'
        ;
        $query .= ' RETURNING *';
        return $query;
    }

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     * @throws IllegalSelectOperationException
     */
    public function generateSelectQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null)
    {
        if(is_null($tableName)) {
            /** @var DatabaseTableSchemaInterface $dataEntity */
            if(!$dataEntity->selectQueriesAllowed()) {
                throw new IllegalSelectOperationException(
                    'SQL SELECT queries forbidden on table '
                    . $this->getFullyQualifiedTableName($dataEntity, PersistenceConstants::READ)
                );
            }
            $tableName = $this->getFullyQualifiedTableName($dataEntity, PersistenceConstants::READ);
        } else {
            $tableName = $this->delimitedFullyQualifiedTableName($schemaName, $tableName);
        }

        /** @var TransitionalDataEntityInterface $dataEntity */
        $query =
            'SELECT * FROM '
            . $tableName
            . $this->generateWhereClauses($dataEntity)
            . $this->generateOrderByClauses($dataEntity)
            . ';'
        ;
        return $query;
    }

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     * @throws IllegalUpdateOperationException
     */
    public function generateUpdateQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null)
    {
        if(is_null($tableName)) {
            /** @var DatabaseTableSchemaInterface $dataEntity */
            if(!$dataEntity->updateQueriesAllowed())
            {
                throw new IllegalUpdateOperationException(
                    'SQL UPDATE queries forbidden on table '
                    . $this->getFullyQualifiedTableName($dataEntity, PersistenceConstants::WRITE)
                );
            }
            $tableName = $this->getFullyQualifiedTableName($dataEntity, PersistenceConstants::WRITE);
        } else {
            $tableName = $this->delimitedFullyQualifiedTableName($schemaName, $tableName);
        }

        /** @var TransitionalDataEntityInterface $dataEntity */
        if(!$dataEntity->fieldsMarkedForUpdate()->count())
        {
            throw new IllegalUpdateOperationException('Cannot generate an SQL UPDATE query without any updated fields');
        }

        if(!$dataEntity->fieldsMarkedAsIdentifiers()->count())
        {
            throw new IllegalUpdateOperationException('Cannot generate an SQL UPDATE query without any identifier fields');
        }

        $query =
            'UPDATE '
            . $tableName
            . ' SET '
        ;
        $updateFields = [];
        foreach($dataEntity->fieldsMarkedForUpdate() as $column)
        {
            $updateFields[] =
                $this->configuration()->openingIdentityDelimiter()
                . $column->fieldName()
                . $this->configuration()->closingIdentityDelimiter()
                . '='
                . $this->configuration()->writeParameterPrefix()
                . $column->fieldName()
            ;
        }
        $query .= implode(', ', $updateFields);
        $query .= $this->generateWhereClauses($dataEntity);
        $query .= ' RETURNING *';
        return $query;
    }
    #endregion
}
