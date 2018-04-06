<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;

interface OperationCacheInterface
{
    /**
     * Caches a Response.
     *
     * @param ResponseInterface $response The Response to be cached.
     * @param CallInterface $call The Call that generates the Response.
     * @param AccessorInterface $accessor The Accessor the Call is made against.
     */
    public function cacheResponse(ResponseInterface $response, CallInterface $call, AccessorInterface $accessor);

    /**
     * Checks whether a cached Response exists.
     *
     * @param CallInterface $call The Call that generates the Response.
     * @param AccessorInterface $accessor The Accessor that the Call is made against.
     * @return bool
     */
    public function cachedResponseExists(CallInterface $call, AccessorInterface $accessor);

    /**
     * Gets the EndPoint of a Call.
     *
     * @param CallInterface $call The Call that generates the EndPoint.
     * @param AccessorInterface $accessor The Accessor that the Call is made against.
     * @return EndPointInterface
     */
    public function endPoint(CallInterface $call, AccessorInterface $accessor);

    /**
     * Flushes the cache
     */
    public function flushCache(): void;

    /**
     * Gets a cached Response.
     *
     * @param CallInterface $call The Call that generates the Response.
     * @param AccessorInterface $accessor The Accessor that the Call is made against.
     * @return ResponseInterface
     */
    public function getCachedResponse(CallInterface $call, AccessorInterface $accessor);

    /**
     * Invalidates Responses that will change if this call is successful.
     *
     * @param CallInterface $call The Call that invalidates the Responses.
     * @param AccessorInterface $accessor The Accessor that the Call is made against.
     */
    public function invalidateDependantResponses(CallInterface $call, AccessorInterface $accessor): void;

    /**
     * Gets the Query of a Call.
     *
     * @param CallInterface $call The Call that generates the Query.
     * @param AccessorInterface $accessor The Accessor that the Call is made against.
     * @return QueryInterface
     */
    public function query(CallInterface $call, AccessorInterface $accessor);
}