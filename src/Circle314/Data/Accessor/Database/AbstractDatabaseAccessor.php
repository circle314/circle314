<?php

namespace Circle314\Data\Accessor\Database;

use \PDO;
use Circle314\Type\TypeInterface\BooleanTypeInterface;
use Circle314\Type\TypeInterface\DateTimeTypeInterface;
use Circle314\Type\TypeInterface\DateTypeInterface;
use Circle314\Type\TypeInterface\IntegerTypeInterface;
use Circle314\Type\TypeInterface\TypeInterface;

abstract class AbstractDatabaseAccessor implements DatabaseAccessorInterface
{
    #region Properties
    /* @var DatabaseConfigurationInterface */
    private $configuration = null;
    /* @var PDO */
    private $PDO = null;
    /* @var bool */
    private $isInTransaction = false;
    /* @var bool */
    private $isConnectionEstablished = false;
    #endregion

    #region Constructor
    /**
     * AbstractDatabaseAccessor constructor.
     * @param DatabaseConfigurationInterface $configuration
     */
    public function __construct(DatabaseConfigurationInterface $configuration) {
        $this->configuration = $configuration;
    }
    #endregion

    #region Public methods
    /**
     * @return bool
     * @throws \Exception
     */
    public function beginTransaction() {
        if($this->isInTransaction()) {
            return true;
        }
        if(is_null($this->PDO())) {
            return $this->connect();
        }
        $this->setIsInTransaction($this->PDO()->beginTransaction());
        return $this->isInTransaction();
    }

    /**
     * @return bool
     */
    public function commitTransaction() {
        if(is_null($this->PDO())) {
            $this->connect();
        }
        if($this->isInTransaction()) {
            $this->setIsInTransaction(false);
            return $this->PDO()->commit();
        } else {
            return true;
        }
    }

    /**
     * @return DatabaseConfigurationInterface|null
     */
    public function configuration()
    {
        return $this->configuration;
    }

    /**
     *
     */
    public function dropConnections() {
        $this->setPDO(null);
    }

    public function errorInfo() {
        return $this->PDO()->errorInfo();
    }

    /**
     * @return string
     */
    public function getLastInsertID() {
        return $this->PDO()->lastInsertId();
    }

    /**
     * @return mixed
     */
    public function ID() {
        return $this->configuration()->ID();
    }

    // Prepare a PDO Statement from a SQL query string
    /**
     * @param string $sql
     * @return \PDOStatement
     * @throws \Exception
     */
    public function prepareStatement($sql) {
        if(is_null($this->PDO())) {
            $this->connect();
        }
        return $this->PDO()->prepare($sql);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function rollbackTransaction() {
        if(is_null($this->PDO())) {
            $this->connect();
        }
        if($this->isInTransaction()) {
            $this->setIsInTransaction(false);
            return $this->PDO()->rollBack();
        }
        return true;
    }

    public function getPDOParamType(TypeInterface $type)
    {
        if(is_null($type->getValue())) {
            return PDO::PARAM_NULL;
        }

        if(is_a($type, BooleanTypeInterface::class)) {
            return PDO::PARAM_BOOL;
        }

        if(is_a($type, IntegerTypeInterface::class)) {
            return PDO::PARAM_INT;
        }

        return PDO::PARAM_STR;
    }

    /**
     * @param TypeInterface $type
     * @return string
     */
    public function getPDOParamValue(TypeInterface $type)
    {
        if(is_a($type, DateTypeInterface::class)) {
            /** @var DateTypeInterface $type */
            $value = $type->format($this->configuration()->dateFormat());
        } elseif(is_a($type, DateTimeTypeInterface::class)) {
            /** @var DateTimeTypeInterface $type */
            $value = $type->format($this->configuration()->dateTimeFormat());
        } else {
            $value = (string)$type;
        }
        return $value;
    }
    #endregion

    #region Protected Methods
    /**
     * @return bool
     */
    final protected function isConnectionEstablished()
    {
        return $this->isConnectionEstablished;
    }

    /**
     * @return bool
     */
    final protected function isInTransaction()
    {
        return $this->isInTransaction;
    }

    /**
     * @return PDO
     */
    final protected function PDO()
    {
        return $this->PDO;
    }

    /**
     * @param $bool
     */
    final protected function setIsConnectionEstablished($bool)
    {
        $this->isConnectionEstablished = $bool;
    }

    /**
     * @param $bool
     */
    final protected function setIsInTransaction($bool)
    {
        $this->isInTransaction = $bool;
    }

    /**
     * @param PDO $PDO
     */
    final protected function setPDO(PDO $PDO)
    {
        $this->PDO = $PDO;
    }
    #endregion

    #region Abstract Methods
    abstract public function connect();
    #endregion
}

?>