<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\EndPointCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Strategy\OperationCachingStrategyInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Component\Encoding\EncodingHandlerInterface;
use Circle314\Component\Hash\HashHandlerInterface;

abstract class AbstractOperationCache implements OperationCacheInterface
{
    #region Properties
    /** @var EndPointCollectionInterface */
    private $cache;

    /** @var EncodingHandlerInterface */
    private $encodingHandler;

    /** @var HashHandlerInterface */
    private $hashHandler;

    /** @var OperationCachingStrategyInterface */
    protected $operationCachingStrategy;
    #endregion

    #region Constructor
    public function __construct(OperationCachingStrategyInterface $operationCachingStrategy, HashHandlerInterface $hashHandler, EncodingHandlerInterface $encodingHandler)
    {
        $this->operationCachingStrategy = $operationCachingStrategy;
        $this->encodingHandler = $encodingHandler;
        $this->hashHandler = $hashHandler;
        $this->flushCache();
    }
    #endregion

    #region Public Methods
    public function cacheResponse(ResponseInterface $response, CallInterface $call, AccessorInterface $accessor)
    {
        $ID = $this->pseudoUniqueIdentifier($call->parameters());
        $this->query($call, $accessor)->saveResponse($ID, $response);
    }

    public function cachedResponseExists(CallInterface $call, AccessorInterface $accessor)
    {
        $ID = $this->pseudoUniqueIdentifier($call->parameters());
        return $this->query($call, $accessor)->hasResponse($ID);
    }

    public function endPoint(CallInterface $call, AccessorInterface $accessor)
    {
        $ID = $call->endPoint();
        if(!$this->cache->hasID($ID)) {
            $this->cache->saveID($ID, $this->operationCachingStrategy->newEndPoint($ID, $call, $accessor));
        }
        return $this->cache->getID($ID);
    }

    final public function flushCache(): void
    {
        $this->cache = $this->operationCachingStrategy->newCache();
    }

    public function getCachedResponse(CallInterface $call, AccessorInterface $accessor)
    {
        $ID = $this->pseudoUniqueIdentifier($call->parameters());
        return $this->query($call, $accessor)->getResponse($ID);
    }

    public function query(CallInterface $call, AccessorInterface $accessor)
    {
        $ID = $this->pseudoUniqueIdentifier($call->query());
        if(!$this->endPoint($call, $accessor)->hasQuery($ID)) {
            $this->endPoint($call, $accessor)->saveQuery($ID, $this->operationCachingStrategy->newQuery($ID, $call, $accessor));
        }
        return $this->endPoint($call, $accessor)->getQuery($ID);
    }
    #endregion

    #region Protected Methods
    /**
     * @return EndPointCollectionInterface
     */
    protected function cache()
    {
        return $this->cache;
    }

    /**
     * Generates a pseudo-unique identifier for a string/array/etc.
     *
     * @param mixed $input The input string/array/etc that will be encoded and hashed to produce a pseudo-unique identifier.
     * @return string
     */
    protected function pseudoUniqueIdentifier($input)
    {
        return $this->hashHandler->hash($this->encodingHandler->encode($input));
    }
    #endregion

    #region Abstract Methods
    abstract public function invalidateDependantResponses(CallInterface $call, AccessorInterface $accessor): void;
    #endregion

}