<?php

namespace Circle314\Component\Data\Persistence\Operation\Mediator;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Collection\Native\NativeKeyedCollection;
use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Component\Encoding\EncodingHandlerInterface;
use Circle314\Component\Hash\HashHandlerInterface;

abstract class AbstractOperationMediator implements OperationMediatorInterface
{
    #region Properties
    /** @var EncodingHandlerInterface */
    private $encodingHandler;

    /** @var HashHandlerInterface */
    private $hashHandler;

    /** @var KeyedCollectionInterface */
    private $environmentCollection;
    #endregion

    #region Constructor
    /**
     * AbstractOperationMediator constructor.
     * @param HashHandlerInterface $hashHandler
     * @param EncodingHandlerInterface $encodingHandler
     */
    public function __construct(HashHandlerInterface $hashHandler, EncodingHandlerInterface $encodingHandler)
    {
        $this->encodingHandler = $encodingHandler;
        $this->hashHandler = $hashHandler;
        $this->environmentCollection = $this->newEnvironmentCollection();
    }
    #endregion

    #region Public Methods
    public function forgetEndPoint(CallInterface $call) : void
    {
        if($this->endPointCollection($call)) {
            $this->endPointCollection($call)->deleteID($call->endPoint());
        }
    }

    public function forgetEnvironment(CallInterface $call) : void
    {
        $this->environmentCollection->deleteID($call->environment());
    }

    public function forgetQuery(CallInterface $call) : void
    {
        if($this->queryCollection($call)) {
            $this->queryCollection($call)->deleteID($this->pseudoUniqueIdentifier($call->query()));
        }
    }

    public function forgetResponse(CallInterface $call) : void
    {
        if($this->responseCollection($call)) {
            $this->responseCollection($call)->deleteID($this->pseudoUniqueIdentifier($call->parameters()));
        }
    }

    public function response(CallInterface $call, AccessorInterface $accessor) : ?ResponseInterface
    {
        $this->invalidateDependantResponses($call);
        if($this->responseCollection($call)) {
            $responseID = $this->pseudoUniqueIdentifier($call->parameters());
            if(!$this->responseCollection($call)->hasID($responseID)) {
                $this->responseCollection($call)->saveID($responseID, $this->generateResponse($call, $accessor));
            }
            return $this->responseCollection($call)->getID($responseID);
        }
        return null;
    }
    #endregion

    #region Protected Methods
    protected function endPointCollection(CallInterface $call) : ?KeyedCollectionInterface
    {
        if($this->environmentCollection->hasID($call->environment())) {
            return $this->environmentCollection->getID($call->environment());
        }
        return null;
    }

    protected function mapEndPointBranch(CallInterface $call, $mappingParameters = null) : void
    {
        if(!$this->queryCollection($call)) {
            $this->mapEnvironment($call);
            $this->endPointCollection($call)->saveID($call->endPoint(), $this->newQueryCollection($mappingParameters));
        }
    }

    protected function mapEnvironment(CallInterface $call, $mappingParameters = null) : void
    {
        if(!$this->endPointCollection($call)) {
            $this->environmentCollection->saveID($call->environment(), $this->newEndPointCollection($mappingParameters));
        }
    }

    protected function mapQueryBranch(CallInterface $call, $mappingParameters = null) : void
    {
        if(!$this->responseCollection($call)) {
            $this->mapEndPointBranch($call);
            $this->queryCollection($call)->saveID($call->query(), $this->newResponseCollection($mappingParameters));
        }
    }

    protected function newEndPointCollection($mappingParameters = null)
    {
        return new NativeKeyedCollection();
    }

    protected function newEnvironmentCollection($mappingParameters = null)
    {
        return new NativeKeyedCollection();
    }

    protected function newQueryCollection($mappingParameters = null)
    {
        return new NativeKeyedCollection();
    }

    protected function newResponseCollection($mappingParameters = null)
    {
        return new NativeKeyedCollection();
    }

    protected function operationCache()
    {
        return $this->environmentCollection;
    }

    protected function pseudoUniqueIdentifier($input)
    {
        return $this->hashHandler->hash($this->encodingHandler->encode($input));
    }

    protected function queryCollection(CallInterface $call) : ?KeyedCollectionInterface
    {
        if($this->endPointCollection($call)) {
            if($this->endPointCollection($call)->hasID($call->endPoint())) {
                return $this->endPointCollection($call)->getID($call->endPoint());
            }
        }
        return null;
    }

    protected function responseCollection(CallInterface $call) : ?KeyedCollectionInterface
    {
        if($this->queryCollection($call)) {
            $queryID = $this->pseudoUniqueIdentifier($call->query());
            if($this->queryCollection($call)->hasID($queryID)) {
                return $this->queryCollection($call)->getID($queryID);
            }
        }
        return null;
    }
    #endregion

    #region Abstract Methods
    abstract protected function invalidateDependantResponses(CallInterface $call);
    abstract protected function generateResponse(CallInterface $call, AccessorInterface $accessor);
    #endregion
}