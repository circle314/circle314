<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Strategy\Database;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\EndPointCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\Native\NativeEndPointCollection;
use Circle314\Component\Data\Persistence\Operation\Cache\Database\DatabaseQueryInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Database\Native\NativeDatabaseQuery;
use Circle314\Component\Data\Persistence\Operation\Cache\Native\NativeEndPoint;
use Circle314\Component\Data\Persistence\Operation\Cache\Strategy\OperationCachingStrategyInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;

class AbstractDatabaseOperationCachingStrategy implements OperationCachingStrategyInterface
{
    /**
     * @return EndPointCollectionInterface
     */
    public function newCache(): EndPointCollectionInterface
    {
        return new NativeEndPointCollection();
    }

    public function newEndPoint($ID, CallInterface $call, AccessorInterface $accessor)
    {
        return new NativeEndPoint($ID);
    }

    /**
     * @return DatabaseQueryInterface
     * @inheritdoc
     */
    public function newQuery($ID, CallInterface $call, AccessorInterface $accessor)
    {
        return new NativeDatabaseQuery($ID, $call, $accessor);
    }
}