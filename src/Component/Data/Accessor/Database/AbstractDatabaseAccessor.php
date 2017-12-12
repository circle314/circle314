<?php

namespace Circle314\Component\Data\Accessor\Database;

use \PDO;
use Circle314\Component\Data\Persistence\PersistenceConstants;
use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;
use Circle314\Component\Data\ValueObject\Collection\Native\NativeDVOCollection;
use Circle314\Component\Data\Mediator\Database\Exception\DatabaseDataPersistenceException;
use Circle314\Component\Schema\Database\DatabaseTableSchemaInterface;
use Circle314\Component\Type\TypeInterface\BooleanTypeInterface;
use Circle314\Component\Type\TypeInterface\DateTimeTypeInterface;
use Circle314\Component\Type\TypeInterface\DateTypeInterface;
use Circle314\Component\Type\TypeInterface\IntegerTypeInterface;
use Circle314\Component\Type\TypeInterface\TypeInterface;
use Circle314\Concept\Ordering\OrderingConstants;
use Circle314\Transitional\TransitionalDataEntityInterface;
use Circle314\Transitional\TransitionalDVOInterface;

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
     * @param TransitionalDataEntityInterface $dataEntity
     * @return DVOCollectionInterface
     */
    final public function generateParameters(TransitionalDataEntityInterface $dataEntity)
    {
        $parameters = new NativeDVOCollection();
        foreach ($dataEntity->fieldsMarkedAsIdentifiers() as $column) {
            if(!is_null($column->identifiedValue()->getValue())) {
                $parameters->saveID($this->configuration()->identifierParameterPrefix() . $column->fieldName(), $column);
            }
        }
        foreach ($dataEntity->fieldsMarkedForUpdate() as $column) {
            $parameters->saveID($this->configuration()->writeParameterPrefix() . $column->fieldName(), $column);
        }
        return $parameters;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @param string $readWrite
     * @return string
     * @throws DatabaseDataPersistenceException
     * @deprecated
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
    final protected function delimitedFullyQualifiedTableName($schemaName, $tableName)
    {
        $schema = $this->configuration()->openingIdentityDelimiter()
            . $schemaName
            . $this->configuration()->closingIdentityDelimiter()
            . '.'
        ;
        $table = $this->configuration()->openingIdentityDelimiter()
            . $tableName
            . $this->configuration()->closingIdentityDelimiter()
        ;
        return $schema . $table;
    }

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @return string
     */
    final protected function generateOrderByClauses(TransitionalDataEntityInterface $dataEntity)
    {
        $query = '';
        if($dataEntity->fieldsMarkedForOrdering()->count())
        {
            $query .= ' ORDER BY ';
            $orderByClauses = [];
            foreach($dataEntity->fieldsMarkedForOrdering() as $column)
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
     * @param TransitionalDataEntityInterface $dataEntity
     * @return string
     */
    final protected function generateWhereClauses(TransitionalDataEntityInterface $dataEntity)
    {
        $query = '';
        if($dataEntity->fieldsMarkedAsIdentifiers()->count())
        {
            $query .= ' WHERE ';
            $whereClauses = [];
            /** @var TransitionalDVOInterface $column */
            foreach($dataEntity->fieldsMarkedAsIdentifiers() as $column)
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
                            . $this->configuration()->identifierParameterPrefix()
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
    abstract public function generateDeleteQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null);
    abstract public function generateInsertQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null);
    abstract public function generateSelectQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null);
    abstract public function generateUpdateQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null);
    #endregion
}
