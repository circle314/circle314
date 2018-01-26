<?php

namespace Circle314\Component\Data\Accessor\Database;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Entity\DataEntityInterface;
use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;
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
     * @param DataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     */
    public function generateDeleteQuery(DataEntityInterface $dataEntity, string $schemaName, string $tableName);

    /**
     * @param DataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     */
    public function generateInsertQuery(DataEntityInterface $dataEntity, string $schemaName, string $tableName);

    /**
     * @param DataEntityInterface $dataEntity
     * @return DVOCollectionInterface
     */
    public function generateParameters(DataEntityInterface $dataEntity);

    /**
     * @param DataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     */
    public function generateSelectQuery(DataEntityInterface $dataEntity, string $schemaName, string $tableName);

    /**
     * @param DataEntityInterface $dataEntity
     * @param string $schemaName
     * @param string $tableName
     * @return string
     */
    public function generateUpdateQuery(DataEntityInterface $dataEntity, string $schemaName, string $tableName);

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
