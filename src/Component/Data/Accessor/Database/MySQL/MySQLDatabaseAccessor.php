<?php

namespace Circle314\Component\Data\Accessor\Database\MySQL;

use \Exception;
use \PDO;
use Circle314\Concept\Persistence\PersistenceConstants;
use Circle314\Component\Data\Mediator\Database\Exception\DatabaseDataPersistenceException;
use Circle314\Component\Schema\Database\DatabaseTableSchemaInterface;
use Circle314\Component\Data\Accessor\Database\AbstractDatabaseAccessor;

/**
 * Class MySQLDatabaseAccessor
 * @package Circle314\Component\Data
 * @method MySQLDatabaseConfiguration configuration()
 */
class MySQLDatabaseAccessor extends AbstractDatabaseAccessor
{
    /**
     * MySQLDatabaseAccessor constructor.
     * @param $configuration MySQLDatabaseConfiguration
     */
    final public function __construct(MySQLDatabaseConfiguration $configuration) {
        parent::__construct($configuration);
    }

    #region Public methods
    /**
     * @return bool
     * @throws \Exception
     */
    public function connect() {
        if(is_null($this->configuration())) {
            throw new Exception('MySQL Database Configuration not set');
        }

        // Only attempt to connect if a connection does not already exist
        if($this->PDO() === null) {
            // Attempt to connect
            $dsn = 'mysql:host=' .
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
                        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
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
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     * @throws DatabaseDataPersistenceException
     */
    public function generateDeleteQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if(!$databaseTableSchema->deleteQueriesAllowed()) {
            throw new DatabaseDataPersistenceException(
                'SQL DELETE queries forbidden on table '
                . $this->getFullyQualifiedTableName($databaseTableSchema, PersistenceConstants::WRITE)
            );
        }

        if(!$databaseTableSchema->fieldsMarkedAsIdentifiers()->count()) {
            throw new DatabaseDataPersistenceException('Cannot generate an SQL DELETE query without identifiers');
        }

        $query =
            'DELETE FROM '
            . $this->getFullyQualifiedTableName($databaseTableSchema, PersistenceConstants::WRITE)
            . $this->generateWhereClauses($databaseTableSchema)
            . ';'
        ;
        return $query;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     * @throws DatabaseDataPersistenceException
     */
    public function generateInsertQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if(!$databaseTableSchema->insertQueriesAllowed())
        {
            throw new DatabaseDataPersistenceException(
                'SQL INSERT queries forbidden on table '
                . $this->getFullyQualifiedTableName($databaseTableSchema, PersistenceConstants::WRITE)
            );
        }

        if(!$databaseTableSchema->fieldsMarkedForUpdate()->count())
        {
            throw new DatabaseDataPersistenceException('Cannot generate an SQL INSERT query without any updated fields');
        }

        $query =
            'INSERT INTO '
            . $this->getFullyQualifiedTableName($databaseTableSchema, PersistenceConstants::WRITE)
        ;
        $columnNames = [];
        $boundValueNames = [];
        foreach($databaseTableSchema->fieldsMarkedForUpdate() as $column)
        {
            $columnNames[] =
                $this->configuration()->openingIdentityDelimiter()
                . $column->fieldName()
                . $this->configuration()->closingIdentityDelimiter()
            ;
            $boundValueNames[] =
                $this->configuration()->updateParameterPrefix()
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
        return $query;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     * @throws DatabaseDataPersistenceException
     */
    public function generateSelectQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if(!$databaseTableSchema->selectQueriesAllowed()) {
            throw new DatabaseDataPersistenceException(
                'SQL SELECT queries forbidden on table '
                . $this->getFullyQualifiedTableName($databaseTableSchema, PersistenceConstants::READ)
            );
        }

        $query =
            'SELECT * FROM '
            . $this->getFullyQualifiedTableName($databaseTableSchema, PersistenceConstants::READ)
            . $this->generateWhereClauses($databaseTableSchema)
            . $this->generateOrderByClauses($databaseTableSchema)
            . ';'
        ;
        return $query;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     * @throws DatabaseDataPersistenceException
     */
    public function generateUpdateQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if(!$databaseTableSchema->updateQueriesAllowed())
        {
            throw new DatabaseDataPersistenceException(
                'SQL UPDATE queries forbidden on table '
                . $this->getFullyQualifiedTableName($databaseTableSchema, PersistenceConstants::WRITE)
            );
        }

        if(!$databaseTableSchema->fieldsMarkedForUpdate()->count())
        {
            throw new DatabaseDataPersistenceException('Cannot generate an SQL UPDATE query without any updated fields');
        }

        if(!$databaseTableSchema->fieldsMarkedAsIdentifiers()->count())
        {
            throw new DatabaseDataPersistenceException('Cannot generate an SQL UPDATE query without any identifier fields');
        }

        $query =
            'UPDATE '
            . $this->getFullyQualifiedTableName($databaseTableSchema, PersistenceConstants::WRITE)
            . ' SET '
        ;
        $updateFields = [];
        foreach($databaseTableSchema->fieldsMarkedForUpdate() as $column)
        {
            $updateFields[] =
                $this->configuration()->openingIdentityDelimiter()
                . $column->fieldName()
                . $this->configuration()->closingIdentityDelimiter()
                . '='
                . $this->configuration()->updateParameterPrefix()
                . $column->fieldName()
            ;
        }
        $query .= implode(', ', $updateFields);
        $query .= $this->generateWhereClauses($databaseTableSchema);
        return $query;
    }
    #endregion
}
