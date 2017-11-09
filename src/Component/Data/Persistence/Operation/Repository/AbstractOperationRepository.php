<?php

namespace Circle314\Component\Data\Persistence\Operation\Repository;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\OperationCacheInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;

abstract class AbstractOperationRepository implements OperationRepositoryInterface
{
    #region Properties
    /** @var OperationCacheInterface */
    private $operationCache;
    #endregion

    #region Constructor
    /**
     * AbstractOperationMediator constructor.
     * @param OperationCacheInterface $operationCache
     */
    public function __construct(OperationCacheInterface $operationCache)
    {
        $this->operationCache = $operationCache;
    }
    #endregion

    #region Public Methods
    public function response(CallInterface $call, AccessorInterface $accessor)
    {
        $this->operationCache->invalidateDependantResponses($call, $accessor);
        if($this->operationCache->cachedResponseExists($call, $accessor)) {
            return $this->operationCache->getCachedResponse($call, $accessor);
        } else {
            $response = $this->generateResponse($call, $accessor);
            $this->operationCache->cacheResponse($response, $call, $accessor);
            return $response;
        }
    }
    #endregion

    #region Protected Methods
    /**
     * @return OperationCacheInterface
     */
    protected function operationCache()
    {
        return $this->operationCache;
    }
    #endregion

    #region Abstract Methods
    /**
     * A Response generated from a Call.
     *
     * @param CallInterface $call The Call that generates the Response.
     * @param AccessorInterface $accessor The Accessor that the Call is made against.
     * @return ResponseInterface
     */
    abstract protected function generateResponse(CallInterface $call, AccessorInterface $accessor);
    #endregion
}