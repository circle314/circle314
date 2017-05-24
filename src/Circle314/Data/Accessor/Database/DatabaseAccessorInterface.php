<?php

namespace Circle314\Data\Accessor\Database;

use Circle314\Data\Accessor\AccessorInterface;
use Circle314\Type\TypeInterface\TypeInterface;

/**
 * Interface IDatabaseAccessor
 * @package Circle314\Data
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

?>