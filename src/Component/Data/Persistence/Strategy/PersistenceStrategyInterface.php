<?php

namespace Circle314\Component\Data\Persistence\Strategy;

use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Transitional\TransitionalDataEntityInterface;

interface PersistenceStrategyInterface
{
    /**
     * Deletes a DataEntity from the persistence mechanism.
     *
     * @param TransitionalDataEntityInterface $dataEntity
     * @return ResponseInterface
     */
    public function delete(TransitionalDataEntityInterface $dataEntity);

    /**
     * Gets a DataEntity from the persistence mechanism.
     *
     * @param TransitionalDataEntityInterface $dataEntity
     * @return ResponseInterface|null
     */
    public function get(TransitionalDataEntityInterface $dataEntity);

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
     * @param TransitionalDataEntityInterface $dataEntity
     * @return ResponseInterface
     */
    public function save(TransitionalDataEntityInterface $dataEntity);
}