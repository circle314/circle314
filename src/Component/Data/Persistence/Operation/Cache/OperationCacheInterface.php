<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;

interface OperationCacheInterface
{
    public function cacheResponse(ResponseInterface $response, CallInterface $call, AccessorInterface $accessor): void;
    public function cachedResponseExists(CallInterface $call, AccessorInterface $accessor): bool;
    public function endPoint(CallInterface $call, AccessorInterface $accessor): EndPointInterface;
    public function getCachedResponse(CallInterface $call, AccessorInterface $accessor): ResponseInterface;
    public function invalidateDependantResponses(CallInterface $call, AccessorInterface $accessor): void;
    public function query(CallInterface $call, AccessorInterface $accessor): QueryInterface;
}