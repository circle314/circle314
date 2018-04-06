<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Strategy;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\EndPointCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\EndPointInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\QueryInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;

interface OperationCachingStrategyInterface
{
    /**
     * Creates a new cache.
     *
     * @return EndPointCollectionInterface
     */
    public function newCache(): EndPointCollectionInterface;

    /**
     * Creates a new EndPoint for a Call.
     *
     * @param mixed $ID The identifier for the EndPoint.
     * @param CallInterface $call The Call that generates the EndPoint.
     * @param AccessorInterface $accessor The Accessor that the Call is made against.
     * @return EndPointInterface
     */
    public function newEndPoint($ID, CallInterface $call, AccessorInterface $accessor);

    /**
     * Creates a new Query for a Call.
     *
     * @param mixed $ID The identifier for the Query.
     * @param CallInterface $call The Call that generates the Query.
     * @param AccessorInterface $accessor The Accessor that the Call is made against.
     * @return QueryInterface
     */
    public function newQuery($ID, CallInterface $call, AccessorInterface $accessor);
}