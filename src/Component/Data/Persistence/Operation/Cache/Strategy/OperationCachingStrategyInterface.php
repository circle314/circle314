<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Strategy;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\EndPointCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\EndPointInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\QueryInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;

interface OperationCachingStrategyInterface
{
    public function newCache(): EndPointCollectionInterface;
    public function newEndPoint($ID, CallInterface $call, AccessorInterface $accessor): EndPointInterface;
    public function newQuery($ID, CallInterface $call, AccessorInterface $accessor): QueryInterface;
}