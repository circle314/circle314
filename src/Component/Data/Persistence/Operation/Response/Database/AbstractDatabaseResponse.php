<?php

namespace Circle314\Component\Data\Persistence\Operation\Response\Database;

use \PDOStatement;
use Circle314\Component\Data\Persistence\Operation\Response\AbstractResponse;

/**
 * Interface DatabaseResponseInterface
 * @package Circle314\Component\Data\Persistence\Operation\Response\Database
 * @method PDOStatement result()
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
    public function columnCount() : int
    {
        return $this->columnCount;
    }

    public function errorCode() : string
    {
        return $this->errorCode;
    }

    public function errorInfo() : array
    {
        return $this->errorInfo;
    }

    public function rowCount() : int
    {
        return $this->rowCount;
    }
    #endregion
}