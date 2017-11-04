<?php

namespace Circle314\Component\Data\Persistence\Strategy;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Mediator\OperationMediatorInterface;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Transitional\TransitionalDataEntityInterface;

abstract class AbstractPersistenceStrategy implements PersistenceStrategyInterface
{
    #region Properties
    /** @var AccessorInterface */
    private $accessor;

    /** @var OperationMediatorInterface */
    private $operationMediator;
    #endregion

    #region Constructor
    public function __construct(
        AccessorInterface $accessor,
        OperationMediatorInterface $operationMediator
    ) {
        $this->accessor = $accessor;
        $this->operationMediator = $operationMediator;
    }
    #endregion

    #region Protected Methods
    final protected function accessor() : AccessorInterface
    {
        return $this->accessor;
    }

    final protected function operationMediator() : OperationMediatorInterface
    {
        return $this->operationMediator;
    }
    #endregion

    #region Abstract Methods
    abstract public function delete(TransitionalDataEntityInterface $dataEntity): ResponseInterface;
    abstract public function get(TransitionalDataEntityInterface $dataEntity): ResponseInterface;
    abstract public function isLessVolatileThan($volatility): bool;
    abstract public function save(TransitionalDataEntityInterface $dataEntity): ResponseInterface;

    abstract protected function deleteOperationsEnabled() : bool;
    abstract protected function insertOperationsEnabled() : bool;
    abstract protected function selectOperationsEnabled() : bool;
    abstract protected function updateOperationsEnabled() : bool;
    #endregion
}