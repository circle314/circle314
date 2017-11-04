<?php

namespace Circle314\Component\Data\Operation\Response\Database;

use \PDOStatement;
use Circle314\Component\Data\Operation\Response\AbstractResponse;

/**
 * Class AbstractDatabaseResponse
 * @package Circle314\Component\Data\Operation\Response\Database
 * @deprecated 0.6
 * @see \Circle314\Component\Data\Persistence\Operation\Response\Database\AbstractDatabaseResponse
 */
abstract class AbstractDatabaseResponse extends AbstractResponse implements DatabaseResponseInterface
{
    #region Properties
    /** @var int */
    protected $columnCount;

    /** @var string */
    protected $errorCode;

    /** @var array */
    protected $errorInfo;

    /** @var int */
    protected $rowCount;
    #endregion

    #region Constructor
    public function __construct(PDOStatement $PDOStatement)
    {
        $result = $PDOStatement->fetchAll();
        $this->columnCount = $PDOStatement->columnCount();
        $this->rowCount = $PDOStatement->rowCount();
        $this->errorCode = $PDOStatement->errorCode();
        $this->errorInfo = $PDOStatement->errorInfo();
        $PDOStatement->closeCursor();
        parent::__construct($result);
    }
    #endregion

    #region Public Methods
    /**
     * @return int
     */
    public function columnCount()
    {
        return $this->columnCount;
    }

    /**
     * @return string
     */
    public function errorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return array
     */
    public function errorInfo()
    {
        return $this->errorInfo;
    }

    /**
     * @return int
     */
    public function rowCount()
    {
        return $this->rowCount;
    }
    #endregion
}