<?php

namespace Circle314\Component\Data\Accessor\Database;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Schema\Database\DatabaseColumnCollection;
use Circle314\Component\Schema\Database\DatabaseTableSchemaInterface;
use Circle314\Component\Type\TypeInterface\TypeInterface;

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
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     */
    public function generateDeleteQuery(DatabaseTableSchemaInterface $databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     */
    public function generateInsertQuery(DatabaseTableSchemaInterface $databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return DatabaseColumnCollection
     */
    public function generateParameters(DatabaseTableSchemaInterface $databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     */
    public function generateSelectQuery(DatabaseTableSchemaInterface $databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     */
    public function generateUpdateQuery(DatabaseTableSchemaInterface $databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @param string $readWrite
     * @return string
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
