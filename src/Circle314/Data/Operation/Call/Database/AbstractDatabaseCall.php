<?php

namespace Circle314\Data\Operation\Call\Database;

use Circle314\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Data\Operation\Call\AbstractCall;
use Circle314\Schema\SchemaFieldInterface;

/**
 * Class AbstractDatabaseCall
 * @package Circle314\Data\Operation\Call\Database
 * @method DatabaseAccessorInterface getAccessor()
 * @method SchemaFieldInterface getParameters()
 */
abstract class AbstractDatabaseCall extends AbstractCall
{
    #region Properties
    /** @var string */
    private $tableName;
    #endregion

    #region Public Methods
    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param $tableName
     * @return $this
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }
    #endregion
}