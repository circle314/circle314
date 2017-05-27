<?php

namespace Circle314\Data\Mediator\Database;

use Circle314\Data\Mediator\Database\Exception\DatabaseDataPersistenceException;
use Circle314\Data\Operation\Call\Database\Native\NativeDatabaseCall;
use Circle314\Schema\Database\DatabaseColumnCollection;
use Circle314\Collection\CollectionInterface;
use Circle314\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Data\Operation\OperationMediatorInterface;
use Circle314\Schema\Database\DatabaseTableSchemaInterface;

abstract class AbstractDatabaseMediator implements DatabaseMediatorInterface
{
    #region Constants
    const   READ        = 'READ';
    const   WRITE       = 'WRITE';
    #endregion

    #region Properties
    /** @var DatabaseAccessorInterface */
    private $databaseAccessor;

    /** @var OperationMediatorInterface */
    private $operationMediator;
    #endregion

    #region Constructor
    /**
     * AbstractDatabaseMediator constructor.
     * @param DatabaseAccessorInterface $databaseAccessor
     * @param OperationMediatorInterface $operationMediator
     */
    final public function __construct(
        DatabaseAccessorInterface       $databaseAccessor,
        OperationMediatorInterface       $operationMediator
    ) {
        $this->databaseAccessor         = $databaseAccessor;
        $this->operationMediator        = $operationMediator;
    }
    #endregion

    #region Public Methods
    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return int Number of rows affected
     */
    final public function delete($databaseTableSchema)
    {
        $call = new NativeDatabaseCall();
        $call->setAccessor($this->databaseAccessor());
        $call->setTableName($this->generateFullyQualifiedTableName($databaseTableSchema, self::WRITE));
        $call->setQuery($this->generateDeleteQuery($databaseTableSchema));
        $call->setParameters($this->generateParameters($databaseTableSchema));
        $this->operationMediator()->clearInvalidatedOperationResults($call);
        return $this->operationMediator()->getCallResponse($call);
    }

    /**
     * @param mixed $databaseTableSchema
     * @return CollectionInterface
     */
    final public function get($databaseTableSchema)
    {
        $call = new NativeDatabaseCall();
        $call->setAccessor($this->databaseAccessor());
        $call->setTableName($this->generateFullyQualifiedTableName($databaseTableSchema, self::WRITE));
        $call->setQuery($this->generateGetQuery($databaseTableSchema));
        $call->setParameters($this->generateParameters($databaseTableSchema));
        return $this->operationMediator()->getCallResponse($call);
    }

    /**
     * @param mixed $databaseTableSchema
     * @return int Number of rows affected
     */
    final public function save($databaseTableSchema)
    {
        $call = new NativeDatabaseCall();
        $call->setAccessor($this->databaseAccessor());
        $call->setTableName($this->generateFullyQualifiedTableName($databaseTableSchema, self::WRITE));
        $call->setQuery($this->generateSaveQuery($databaseTableSchema));
        $call->setParameters($this->generateParameters($databaseTableSchema));
        $this->operationMediator()->clearInvalidatedOperationResults($call);
        return $this->operationMediator()->getCallResponse($call);
    }


    final public function clearTableCache()
    {
        $this->operationMediator()->clearAllResultsForAccessor($this->databaseAccessor());
    }

    /**
     * @return int
     */
    final public function getLastInsertID() {
        return $this->databaseAccessor()->getLastInsertID();
    }
    #endregion

    #region Protected Methods
    /**
     * @return DatabaseAccessorInterface
     */
    final protected function databaseAccessor()
    {
        return $this->databaseAccessor;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return DatabaseColumnCollection
     */
    final protected function generateParameters(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        $parameters = new DatabaseColumnCollection();
        foreach ($databaseTableSchema->fieldsMarkedAsIdentifiers() as $column) {
            $parameters->saveID(':' . $column->fieldName(), $column);
        }
        foreach ($databaseTableSchema->fieldsMarkedForUpdate() as $column) {
            $parameters->saveID(':' . $column->fieldName(), $column);
        }
        return $parameters;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     * @throws DatabaseDataPersistenceException
     */
    final protected function generateDeleteQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if(!$databaseTableSchema->deleteQueriesAllowed()) {
            throw new DatabaseDataPersistenceException(
                'SQL DELETE queries forbidden on table '
                . $this->generateFullyQualifiedTableName($databaseTableSchema, self::WRITE)
            );
        }

        if(!$databaseTableSchema->fieldsMarkedAsIdentifiers()->count()) {
            throw new DatabaseDataPersistenceException('Cannot generate an SQL DELETE query without identifiers');
        }

        $query =
            'DELETE FROM '
            . $this->generateFullyQualifiedTableName($databaseTableSchema, self::WRITE)
            . $this->generateWhereClauses($databaseTableSchema)
            . ';'
        ;
        return $query;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @param string $readWrite
     * @return string
     * @throws DatabaseDataPersistenceException
     */
    final protected function generateFullyQualifiedTableName(DatabaseTableSchemaInterface $databaseTableSchema, $readWrite)
    {
        switch($readWrite)
        {
            case self::READ:
                $tableName = $databaseTableSchema->tableNameForReads();
                break;
            case self::WRITE:
                $tableName = $databaseTableSchema->tableNameForWrites();
                break;
            default:
                throw new DatabaseDataPersistenceException('Calls to ' . __METHOD__ . ' must have context of either READ or WRITE');
        }
        $database = $this->databaseAccessor()->configuration()->supportsCrossDatabaseReferences()
            ? (
                $this->openingIdentityDelimiter()
                . $databaseTableSchema->databaseName()
                . $this->closingIdentityDelimiter()
                . '.'
            )
            : ''
        ;
        $schema = $this->openingIdentityDelimiter()
            . $databaseTableSchema->databaseSchemaName()
            . $this->closingIdentityDelimiter()
            . '.'
        ;
        $table = $this->openingIdentityDelimiter()
            . $tableName
            . $this->closingIdentityDelimiter()
        ;
        return $database . $schema . $table;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     * @throws DatabaseDataPersistenceException
     */
    final protected function generateGetQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if(!$databaseTableSchema->selectQueriesAllowed())
        {
            throw new DatabaseDataPersistenceException(
                'SQL SELECT queries forbidden on table '
                . $this->generateFullyQualifiedTableName($databaseTableSchema, self::READ)
            );
        }

        $query =
            'SELECT * FROM '
            . $this->generateFullyQualifiedTableName($databaseTableSchema, self::READ)
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
    final protected function generateInsertQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if(!$databaseTableSchema->insertQueriesAllowed())
        {
            throw new DatabaseDataPersistenceException(
                'SQL INSERT queries forbidden on table '
                . $this->generateFullyQualifiedTableName($databaseTableSchema, self::WRITE)
            );
        }

        if(!$databaseTableSchema->fieldsMarkedForUpdate()->count())
        {
            throw new DatabaseDataPersistenceException('Cannot generate an SQL INSERT query without any updated fields');
        }

        $query =
            'INSERT INTO '
            . $this->generateFullyQualifiedTableName($databaseTableSchema, self::WRITE)
        ;
        $columnNames = [];
        $boundValueNames = [];
        foreach($databaseTableSchema->fieldsMarkedForUpdate() as $column)
        {
            $columnNames[] =
                $this->openingIdentityDelimiter()
                . $column->fieldName()
                . $this->closingIdentityDelimiter()
            ;
            $boundValueNames[] =
                ':'
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
     */
    final protected function generateSaveQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if($databaseTableSchema->fieldsMarkedAsIdentifiers()->count()) {
            return $this->generateUpdateQuery($databaseTableSchema);
        } else {
            return $this->generateInsertQuery($databaseTableSchema);
        }
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     * @throws DatabaseDataPersistenceException
     */
    final protected function generateUpdateQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if(!$databaseTableSchema->updateQueriesAllowed())
        {
            throw new DatabaseDataPersistenceException(
                'SQL UPDATE queries forbidden on table '
                . $this->generateFullyQualifiedTableName($databaseTableSchema, self::WRITE)
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
            . $this->generateFullyQualifiedTableName($databaseTableSchema, self::WRITE)
            . ' SET '
        ;
        $updateFields = [];
        foreach($databaseTableSchema->fieldsMarkedForUpdate() as $column)
        {
            $updateFields[] =
                $this->openingIdentityDelimiter()
                . $column->fieldName()
                . $this->closingIdentityDelimiter()
                . '=:'
                . $column->fieldName()
            ;
        }
        $query .= implode(', ', $updateFields);
        $query .= $this->generateWhereClauses($databaseTableSchema);
        return $query;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     */
    final protected function generateWhereClauses(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        $query = '';
        if($databaseTableSchema->fieldsMarkedAsIdentifiers()->count())
        {
            $query .= ' WHERE ';
            $whereClauses = [];
            foreach($databaseTableSchema->fieldsMarkedAsIdentifiers() as $column)
            {
                $whereClauses[] =
                    $this->openingIdentityDelimiter()
                    . $column->fieldName()
                    . $this->closingIdentityDelimiter()
                    . '=:'
                    . $column->fieldName();
            }
            $query .= implode(' AND ', $whereClauses);
        }
        return $query;
    }

    /**
     * @return string
     */
    final protected function closingIdentityDelimiter()
    {
        return $this->databaseAccessor()->configuration()->getClosingIdentityDelimiter();
    }

    /**
     * @return string
     */
    final protected function openingIdentityDelimiter()
    {
        return $this->databaseAccessor()->configuration()->getOpeningIdentityDelimiter();
    }

    /**
     * @return \Circle314\Data\Operation\OperationMediatorInterface
     */
    final protected function operationMediator()
    {
        return $this->operationMediator;
    }
    #endregion

}