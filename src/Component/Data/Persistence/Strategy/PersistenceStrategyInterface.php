<?php

namespace Circle314\Component\Data\Persistence\Strategy;

use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Transitional\TransitionalDataEntityInterface;

interface PersistenceStrategyInterface
{
    public function delete(TransitionalDataEntityInterface $dataEntity) : ResponseInterface;
    public function get(TransitionalDataEntityInterface $dataEntity): ?ResponseInterface;
    public function isLessVolatileThan($volatility) : bool;
    public function save(TransitionalDataEntityInterface $dataEntity) : ResponseInterface;
}