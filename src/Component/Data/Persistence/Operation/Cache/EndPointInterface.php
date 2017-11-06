<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache;

use Circle314\Concept\Identification\IdentifiableInterface;

interface EndPointInterface extends IdentifiableInterface
{
    public function getQuery($queryID): QueryInterface;
    public function hasQuery($queryID): bool;
    public function saveQuery($queryID, $query): void;
}