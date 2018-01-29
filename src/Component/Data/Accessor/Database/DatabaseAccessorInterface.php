<?php

namespace Circle314\Component\Data\Accessor\Database;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Entity\DataEntityInterface;
use Circle314\Component\Data\Persistence\Object\Database\DatabaseObjectInterface;
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
     * Generates a DELETE query given the DataEntity and DatabaseObject.
     *
     * @param DataEntityInterface $dataEntity
     * @param DatabaseObjectInterface $databaseObject
     * @return string
     */
    public function generateDeleteQuery(DataEntityInterface $dataEntity, DatabaseObjectInterface $databaseObject);

    /**
     * Generates an INSERT query given the DataEntity and DatabaseObject.
     *
     * @param DataEntityInterface $dataEntity
     * @param DatabaseObjectInterface $databaseObject
     * @return string
     */
    public function generateInsertQuery(DataEntityInterface $dataEntity, DatabaseObjectInterface $databaseObject);

    /**
     * @param DataEntityInterface $dataEntity
     * @return DVOCollectionInterface
     */
    public function generateParameters(DataEntityInterface $dataEntity);

    /**
     * Generates a SELECT query given the DataEntity and DatabaseObject.
     *
     * @param DataEntityInterface $dataEntity
     * @param DatabaseObjectInterface $databaseObject
     * @return string
     */
    public function generateSelectQuery(DataEntityInterface $dataEntity, DatabaseObjectInterface $databaseObject);

    /**
     * Generates an UPDATE query given the DataEntity and DatabaseObject.
     *
     * @param DataEntityInterface $dataEntity
     * @param DatabaseObjectInterface $databaseObject
     * @return string
     */
    public function generateUpdateQuery(DataEntityInterface $dataEntity, DatabaseObjectInterface $databaseObject);

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
