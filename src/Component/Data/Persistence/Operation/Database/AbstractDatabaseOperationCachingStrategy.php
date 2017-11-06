<?php

namespace Circle314\Component\Data\Persistence\Operation\Database;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\EndPointCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\Native\NativeEndPointCollection;
use Circle314\Component\Data\Persistence\Operation\Cache\EndPointInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Native\NativeEndPoint;
use Circle314\Component\Data\Persistence\Operation\Cache\QueryInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Strategy\OperationCachingStrategyInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;
use Circle314\Component\Data\Persistence\Operation\Database\Native\NativeDatabaseQuery;

class AbstractDatabaseOperationCachingStrategy implements OperationCachingStrategyInterface
{
    /**
     * @return EndPointCollectionInterface
     */
    public function newCache(): EndPointCollectionInterface
    {
        return new NativeEndPointCollection();
    }

    /**
     * @param $ID
     * @param CallInterface $call
     * @param AccessorInterface $accessor
     * @return EndPointInterface
     */
    public function newEndPoint($ID, CallInterface $call, AccessorInterface $accessor): EndPointInterface
    {
        return new NativeEndPoint($ID);
    }

    /**
     * @param $ID
     * @param CallInterface $call
     * @param AccessorInterface $accessor
     * @return QueryInterface
     */
    public function newQuery($ID, CallInterface $call, AccessorInterface $accessor): QueryInterface
    {
        return new NativeDatabaseQuery($ID, $call, $accessor);
    }

}