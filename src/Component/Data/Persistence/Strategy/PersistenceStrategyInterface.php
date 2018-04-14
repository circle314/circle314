<?php

namespace Circle314\Component\Data\Persistence\Strategy;

use Circle314\Component\Data\Entity\DataEntityInterface;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;

interface PersistenceStrategyInterface
{
    /**
     * Deletes a DataEntity from the persistence mechanism.
     *
     * @param DataEntityInterface $dataEntity
     * @return ResponseInterface
     */
    public function delete(DataEntityInterface $dataEntity);

    /**
     * Gets a DataEntity from the persistence mechanism.
     *
     * @param DataEntityInterface $dataEntity
     * @return ResponseInterface|null
     */
    public function get(DataEntityInterface $dataEntity);

    /**
     * Checks whether the persistence strategy is less volatile than the supplied volatility value.
     *
     * @param $volatility
     * @return bool
     */
    public function isLessVolatileThan($volatility);

    /**
     * Saves the DataEntity to the persistence mechanism.
     *
     * @param DataEntityInterface $dataEntity
     * @param bool $forceOperation Whether or not to force the save operation. Handy for when you know fields have not been updated, but you want to ensure that the entity is persisted in it's current state
     * @return ResponseInterface
     */
    public function save(DataEntityInterface $dataEntity, bool $forceOperation = false);
}