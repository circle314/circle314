<?php

namespace Circle314\Component\Data\Operation\Call\Database;

use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Operation\Call\CallInterface;
use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;

/**
 * Interface DatabaseCallInterface
 * @package Circle314\Component\Data\Operation\Call\Database
 * @method DatabaseAccessorInterface getAccessor()
 * @method DVOCollectionInterface getParameters()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\Persistence\Operation\Call\CallInterface
 */
interface DatabaseCallInterface extends CallInterface
{
    /**
     * @return mixed
     */
    public function getTableName();

    /**
     * @param string $tableName
     * @return mixed
     */
    public function setTableName($tableName);
}