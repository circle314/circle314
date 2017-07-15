<?php

namespace Circle314\Data\Accessor\Database;

use \PDO;
use Circle314\Concept\Ordering\OrderingConstants;
use Circle314\Schema\SchemaFieldInterface;
use Circle314\Collection\CollectionInterface;
use Circle314\Concept\Persistence\PersistenceConstants;
use Circle314\Data\Mediator\Database\Exception\DatabaseDataPersistenceException;
use Circle314\Schema\Database\DatabaseColumnCollection;
use Circle314\Schema\Database\DatabaseTableSchemaInterface;
use Circle314\Type\TypeInterface\BooleanTypeInterface;
use Circle314\Type\TypeInterface\DateTimeTypeInterface;
use Circle314\Type\TypeInterface\DateTypeInterface;
use Circle314\Type\TypeInterface\IntegerTypeInterface;
use Circle314\Type\TypeInterface\TypeInterface;

abstract class AbstractDatabaseAccessor implements DatabaseAccessorInterface
{
    #region Properties
    /* @var DatabaseConfigurationInterface */
    private $configuration = null;
    /* @var PDO */
    private $PDO = null;
    /* @var bool */
    private $isInTransaction = false;
    /* @var bool */
    private $isConnectionEstablished = false;
    #endregion

    #region Constructor
    /**
     * AbstractDatabaseAccessor constructor.
     * @param DatabaseConfigurationInterface $configuration
     */
    public function __construct(DatabaseConfigurationInterface $configuration) {
        $this->configuration = $configuration;
    }
    #endregion

    #region Public methods
    /**
     * @return bool
     * @throws \Exception
     */
    public function beginTransaction() {
        if($this->isInTransaction()) {
            return true;
        }
        if(is_null($this->PDO())) {
            return $this->connect();
        }
        $this->setIsInTransaction($this->PDO()->beginTransaction());
        return $this->isInTransaction();
    }

    /**
     * @return bool
     */
    public function commitTransaction() {
        if(is_null($this->PDO())) {
            $this->connect();
        }
        if($this->isInTransaction()) {
            $this->setIsInTransaction(false);
            return $this->PDO()->commit();
        } else {
            return true;
        }
    }

    /**
     * @return DatabaseConfigurationInterface|null
     */
    public function configuration()
    {
        return $this->configuration;
    }

    /**
     *
     */
    public function dropConnections() {
        $this->PDO = null;
    }

    /**
     * @return array
     */
    public function errorInfo() {
        return $this->PDO()->errorInfo();
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return DatabaseColumnCollection
     */
    final public function generateParameters(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        $parameters = new DatabaseColumnCollection();
        /** @var SchemaFieldInterface $column */
        foreach ($databaseTableSchema->fieldsMarkedAsIdentifiers() as $column) {
            if(!is_null($column->identifiedValue()->getValue())) {
                $parameters->saveID($this->configuration()->insertParameterPrefix() . $column->fieldName(), $column);
            }
        }
        foreach ($databaseTableSchema->fieldsMarkedForUpdate() as $column) {
            $parameters->saveID($this->configuration()->updateParameterPrefix() . $column->fieldName(), $column);
        }
        return $parameters;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @param string $readWrite
     * @return string
     * @throws DatabaseDataPersistenceException
     */
    final public function getFullyQualifiedTableName(DatabaseTableSchemaInterface $databaseTableSchema, $readWrite)
    {
        switch($readWrite)
        {
            case PersistenceConstants::READ:
                $tableName = $databaseTableSchema->tableNameForReads();
                break;
            case PersistenceConstants::WRITE:
                $tableName = $databaseTableSchema->tableNameForWrites();
                break;
            default:
                throw new DatabaseDataPersistenceException('Calls to ' . __METHOD__ . ' must have context of either READ or WRITE');
        }
        $database = $this->configuration()->supportsCrossDatabaseReferences()
            ? (
                $this->configuration()->openingIdentityDelimiter()
                . $databaseTableSchema->databaseName()
                . $this->configuration()->closingIdentityDelimiter()
                . '.'
            )
            : ''
        ;
        $schema = $this->configuration()->openingIdentityDelimiter()
            . $databaseTableSchema->databaseSchemaName()
            . $this->configuration()->closingIdentityDelimiter()
            . '.'
        ;
        $table = $this->configuration()->openingIdentityDelimiter()
            . $tableName
            . $this->configuration()->closingIdentityDelimiter()
        ;
        return $database . $schema . $table;
    }

    /**
     * @return string
     */
    public function getLastInsertID() {
        return $this->PDO()->lastInsertId();
    }

    /**
     * @param TypeInterface $type
     * @return int
     */
    public function getPDOParamType(TypeInterface $type)
    {
        if(is_null($type->getValue())) {
            return PDO::PARAM_NULL;
        }

        if(is_a($type, BooleanTypeInterface::class)) {
            return PDO::PARAM_BOOL;
        }

        if(is_a($type, IntegerTypeInterface::class)) {
            return PDO::PARAM_INT;
        }

        return PDO::PARAM_STR;
    }

    /**
     * @param TypeInterface $type
     * @return string
     */
    public function getPDOParamValue(TypeInterface $type)
    {
        if(is_a($type, DateTypeInterface::class)) {
            /** @var DateTypeInterface $type */
            $value = $type->format($this->configuration()->dateFormat());
        } elseif(is_a($type, DateTimeTypeInterface::class)) {
            /** @var DateTimeTypeInterface $type */
            $value = $type->format($this->configuration()->dateTimeFormat());
        } else {
            $value = $type->getValue();
        }
        return $value;
    }

    /**
     * @return mixed
     */
    public function ID() {
        return $this->configuration()->ID();
    }

    /**
     * Prepare a PDO Statement from a SQL query string
     *
     * @param string $sql
     * @return \PDOStatement
     * @throws \Exception
     */
    public function prepareStatement($sql) {
        if(is_null($this->PDO())) {
            $this->connect();
        }
        return $this->PDO()->prepare($sql);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function rollbackTransaction() {
        if(is_null($this->PDO())) {
            $this->connect();
        }
        if($this->isInTransaction()) {
            $this->setIsInTransaction(false);
            return $this->PDO()->rollBack();
        }
        return true;
    }
    #endregion

    #region Protected Methods
    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     */
    final protected function generateOrderByClauses(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        $query = '';
        if($databaseTableSchema->fieldsMarkedForOrdering()->count())
        {
            $query .= ' ORDER BY ';
            $orderByClauses = [];
            /** @var SchemaFieldInterface $column */
            foreach($databaseTableSchema->fieldsMarkedForOrdering() as $column)
            {
                $fullyQualifiedFieldName = $this->configuration->openingIdentityDelimiter()
                    . $column->fieldName()
                    . $this->configuration->closingIdentityDelimiter()
                ;
                switch($column->orderingDirection()) {
                    case OrderingConstants::ASCENDING:
                        $orderByClauses[] = $fullyQualifiedFieldName . ' ASC';
                        break;
                    case OrderingConstants::ASCENDING_NULLS_FIRST:
                        $orderByClauses[] = $fullyQualifiedFieldName . ' IS NOT NULL';
                        $orderByClauses[] = $fullyQualifiedFieldName . ' ASC';
                        break;
                    case OrderingConstants::DESCENDING:
                        $orderByClauses[] = $fullyQualifiedFieldName . ' DESC';
                        break;
                    case OrderingConstants::DESCENDING_NULLS_LAST:
                        $orderByClauses[] = $fullyQualifiedFieldName . ' IS NULL';
                        $orderByClauses[] = $fullyQualifiedFieldName . ' DESC';
                        break;
                }
            }
            $query .= implode(', ', $orderByClauses);
        }
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
            /** @var SchemaFieldInterface $column */
            foreach($databaseTableSchema->fieldsMarkedAsIdentifiers() as $column)
            {
                $whereClauses[] =
                    $this->configuration->openingIdentityDelimiter()
                    . $column->fieldName()
                    . $this->configuration->closingIdentityDelimiter()
                    . (
                        is_null($column->identifiedValue()->getValue())
                        ? ' IS NULL'
                        : (
                            '='
                            . $this->configuration()->insertParameterPrefix()
                            . $column->fieldName()
                        )
                    )
                ;
            }
            $query .= implode(' AND ', $whereClauses);
        }
        return $query;
    }

    /**
     * @return bool
     */
    final protected function isConnectionEstablished()
    {
        return $this->isConnectionEstablished;
    }

    /**
     * @return bool
     */
    final protected function isInTransaction()
    {
        return $this->isInTransaction;
    }

    /**
     * @return PDO
     */
    final protected function PDO()
    {
        return $this->PDO;
    }

    /**
     * @param $bool
     */
    final protected function setIsConnectionEstablished($bool)
    {
        $this->isConnectionEstablished = $bool;
    }

    /**
     * @param $bool
     */
    final protected function setIsInTransaction($bool)
    {
        $this->isInTransaction = $bool;
    }

    /**
     * @param PDO $PDO
     */
    final protected function setPDO(PDO $PDO)
    {
        $this->PDO = $PDO;
    }
    #endregion

    #region Abstract Methods
    abstract public function connect();

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return bool
     */
    abstract public function generateDeleteQuery(DatabaseTableSchemaInterface $databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return CollectionInterface
     */
    abstract public function generateInsertQuery(DatabaseTableSchemaInterface $databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return CollectionInterface
     */
    abstract public function generateSelectQuery(DatabaseTableSchemaInterface $databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return CollectionInterface
     */
    abstract public function generateUpdateQuery(DatabaseTableSchemaInterface $databaseTableSchema);
    #endregion
}
