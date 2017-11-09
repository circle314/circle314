<?php

namespace Circle314\Component\Data\Persistence\Strategy;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Repository\OperationRepositoryInterface;
use Circle314\Transitional\TransitionalDataEntityInterface;

abstract class AbstractPersistenceStrategy implements PersistenceStrategyInterface
{
    #region Properties
    /** @var AccessorInterface */
    private $accessor;

    /** @var OperationRepositoryInterface */
    private $operationRepository;
    #endregion

    #region Constructor
    public function __construct(
        AccessorInterface $accessor,
        OperationRepositoryInterface $operationMediator
    ) {
        $this->accessor = $accessor;
        $this->operationRepository = $operationMediator;
    }
    #endregion

    #region Protected Methods
    /**
     * @return AccessorInterface
     */
    final protected function accessor()
    {
        return $this->accessor;
    }

    /**
     * @return OperationRepositoryInterface
     */
    final protected function operationRepository()
    {
        return $this->operationRepository;
    }
    #endregion

    #region Abstract Methods
    abstract public function delete(TransitionalDataEntityInterface $dataEntity);
    abstract public function get(TransitionalDataEntityInterface $dataEntity);
    abstract public function isLessVolatileThan($volatility);
    abstract public function save(TransitionalDataEntityInterface $dataEntity);

    /**
     * Checks whether delete operations are enabled for this strategy.
     *
     * @return bool
     */
    abstract protected function deleteOperationsEnabled(): bool;

    /**
     * Checks whether insert operations are enabled for this strategy.
     *
     * @return bool
     */
    abstract protected function insertOperationsEnabled(): bool;

    /**
     * Checks whether select operations are enabled for this strategy.
     *
     * @return bool
     */
    abstract protected function selectOperationsEnabled(): bool;

    /**
     * Checks whether update operations are enabled for this strategy.
     *
     * @return bool
     */
    abstract protected function updateOperationsEnabled(): bool;
    #endregion
}