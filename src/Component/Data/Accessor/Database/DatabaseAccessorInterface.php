<?php

namespace Circle314\Component\Data\Accessor\Database;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;
use Circle314\Component\Schema\Database\DatabaseTableSchemaInterface;
use Circle314\Component\Type\TypeInterface\TypeInterface;
use Circle314\Transitional\TransitionalDataEntityInterface;

/**
 * Interface IDatabaseAccessor
 * @package Circle314\Component\Data
 */
interface DatabaseAccessorInterface extends AccessorInterface
{
    /**
     * @return mixed
     */
    public function beginTransaction();

    /**
     * @return mixed
     */
    public function commitTransaction();

    /**
     * @return DatabaseConfigurationInterface
     */
    public function configuration();

    /**
     * @return mixed
     */
    public function connect();

    /**
     * @return mixed
     */
    public function dropConnections();

    /** @return array */
    public function errorInfo();

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     */
    public function generateDeleteQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null);

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     */
    public function generateInsertQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null);

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @return DVOCollectionInterface
     */
    public function generateParameters(TransitionalDataEntityInterface $dataEntity);

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     */
    public function generateSelectQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null);

    /**
     * @param TransitionalDataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     */
    public function generateUpdateQuery(TransitionalDataEntityInterface $dataEntity, $schemaName = null, $tableName = null);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @param string $readWrite
     * @return string
     * @deprecated 0.6
     */
    public function getFullyQualifiedTableName(DatabaseTableSchemaInterface $databaseTableSchema, $readWrite);

    /**
     * @return integer
     */
    public function getLastInsertID();

    /**
     * @param string $sql
     * @return \PDOStatement
     */
    public function prepareStatement($sql);

    /**
     * @return mixed
     */
    public function rollbackTransaction();

    /**
     * @param TypeInterface $type
     * @return string
     */
    public function getPDOParamValue(TypeInterface $type);

    /**
     * @param TypeInterface $type
     * @return mixed
     */
    public function getPDOParamType(TypeInterface $type);
}
