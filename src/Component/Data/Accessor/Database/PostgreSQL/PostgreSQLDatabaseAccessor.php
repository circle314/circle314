<?php

namespace Circle314\Component\Data\Accessor\Database\PostgreSQL;

use Circle314\Component\Data\Entity\DataEntityInterface;
use \Exception;
use \PDO;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalDeleteOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalInsertOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalUpdateOperationException;
use Circle314\Component\Data\Accessor\Database\AbstractDatabaseAccessor;

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
     * @inheritdoc
     * @throws IllegalDeleteOperationException
     */
    public function generateDeleteQuery(DataEntityInterface $dataEntity, string $schemaName, string $tableName)
    {
        $tableName = $this->delimitedFullyQualifiedTableName($schemaName, $tableName);

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
     * @inheritdoc
     * @throws IllegalInsertOperationException
     */
    public function generateInsertQuery(DataEntityInterface $dataEntity, string $schemaName, string $tableName)
    {
        $tableName = $this->delimitedFullyQualifiedTableName($schemaName, $tableName);

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
     * @inheritdoc
     */
    public function generateSelectQuery(DataEntityInterface $dataEntity, string $schemaName, string $tableName)
    {
        $tableName = $this->delimitedFullyQualifiedTableName($schemaName, $tableName);

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
     * @inheritdoc
     * @throws IllegalUpdateOperationException
     */
    public function generateUpdateQuery(DataEntityInterface $dataEntity, string $schemaName, string $tableName)
    {
        $tableName = $this->delimitedFullyQualifiedTableName($schemaName, $tableName);

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
