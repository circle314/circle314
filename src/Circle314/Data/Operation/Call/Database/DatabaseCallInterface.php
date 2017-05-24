<?php

namespace Circle314\Data\Operation\Call\Database;

use Circle314\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Data\Operation\Call\CallInterface;
use Circle314\Schema\Database\DatabaseColumnCollection;

/**
 * Interface DatabaseCallInterface
 * @package Circle314\Data\Operation\Call\Database
 * @method DatabaseAccessorInterface getAccessor()
 * @method DatabaseColumnCollection getParameters()
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