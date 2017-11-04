<?php

namespace Circle314\Component\Data\Operation;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Collection\Native\NativeKeyedCollection;
use Circle314\Concept\Null\NullConstants;
use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Operation\Call\CallInterface;
use Circle314\Component\Data\Operation\Call\Native\NativeCall;
use Circle314\Component\Data\Operation\Response\ResponseInterface;
use Circle314\Component\Encoding\EncodingHandlerInterface;
use Circle314\Component\Hash\HashHandlerInterface;

/**
 * Class AbstractOperationMediator
 * @package Circle314\Component\Data\Operation
 * @deprecated 0.6
 * @see \Circle314\Component\Data\Persistence\Operation\Mediator\AbstractOperationMediator
 */
abstract class AbstractOperationMediator implements OperationMediatorInterface
{
    #region Properties
    /** @var EncodingHandlerInterface */
    private $encodingHandler;

    /** @var HashHandlerInterface */
    private $hashHandler;

    /** @var KeyedCollectionInterface */
    private $operationRepository;
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
        $this->operationRepository = new NativeKeyedCollection();
    }
    #endregion

    #region Public Methods
    final public function clearAllResultsForAccessor(AccessorInterface $accessor)
    {
        $call = new NativeCall();
        $call->setAccessor($accessor);
        $this->getAccessorBranch($call)->clearCollection();
    }
    #endregion

    #region Protected Methods
    /**
     * @param CallInterface $call
     */
    protected function ensureAccessorBranchExistsInOperationRepository(CallInterface $call)
    {
        if(!$this->operationRepository->hasID($this->getAccessorBranchName($call))) {
            $this->operationRepository->saveID($this->getAccessorBranchName($call), $this->generateNewAccessorBranch($call));
        }
    }

    /**
     * @param CallInterface $call
     */
    protected function ensureQueryBranchExistsInOperationRepository(CallInterface $call)
    {
        $this->ensureQueryBranchParentExistsInOperationRepository($call);
        $this->getQueryBranchParent($call)->saveID($this->getQueryBranchName($call), $this->generateNewQueryBranch($call));
    }

    /**
     * @param CallInterface $call
     * @return KeyedCollectionInterface
     */
    protected function getAccessorBranch(CallInterface $call)
    {
        $this->ensureAccessorBranchExistsInOperationRepository($call);
        /** @var NativeKeyedCollection $accessorBranch */
        return $this->operationRepository()->getID($this->getAccessorBranchName($call));
    }

    /**
     * @param CallInterface $call
     * @return string
     */
    protected function getAccessorBranchName(CallInterface $call)
    {
        return $call->getAccessor()->ID();
    }

    /**
     * @param CallInterface $call
     * @return ResponseInterface|string
     */
    protected function getResponse(CallInterface $call)
    {
        if(!$this->getResponseParent($call)->hasID($this->getResponseName($call))) {
            return NullConstants::NO_RESPONSE_EXISTS;
        } else {
            return $this->getResponseParent($call)->getID($this->getResponseName($call));
        }
    }

    /**
     * @param CallInterface $call
     * @return mixed
     */
    protected function getResponseName(CallInterface $call)
    {
        return $this->hashHandler->hash(
            $this->encodingHandler->encode(
                $call->getParameters()->getArrayCopy()
            )
        );
    }

    /**
     * @param CallInterface $call
     * @return KeyedCollectionInterface
     */
    protected function getQueryBranch(CallInterface $call)
    {
        return $this->getQueryBranchParent($call)->getID($this->getQueryBranchName($call));
    }

    /**
     * @param CallInterface $call
     * @return mixed
     */
    protected function getQueryBranchName(CallInterface $call)
    {
        return $this->hashHandler->hash($call->getQuery());
    }

    /**
     * @return NativeKeyedCollection
     */
    protected function operationRepository()
    {
        return $this->operationRepository;
    }
    #endregion

    #region Abstract Methods
    /**
     * @param CallInterface $call
     * @return void
     */
    abstract public function clearInvalidatedOperationResults(CallInterface $call);

    /**
     * @param CallInterface $call
     * @return ResponseInterface
     */
    abstract public function getCallResponse(CallInterface $call);

    /**
     * @param CallInterface $call
     * @return void
     */
    abstract protected function ensureQueryBranchParentExistsInOperationRepository(CallInterface $call);

    /**
     * @param CallInterface $call
     * @return void
     */
    abstract protected function ensureResponseLeafParentExistsInOperationRepository(CallInterface $call);

    /**
     * @param CallInterface $call
     * @return KeyedCollectionInterface
     */
    abstract protected function generateNewAccessorBranch(CallInterface $call);

    /**
     * @param CallInterface $call
     * @return KeyedCollectionInterface
     */
    abstract protected function generateNewQueryBranch(CallInterface $call);

    /**
     * @param CallInterface $call
     * @return KeyedCollectionInterface
     */
    abstract protected function getQueryBranchParent(CallInterface $call);

    /**
     * @param CallInterface $call
     * @return KeyedCollectionInterface
     */
    abstract protected function getResponseParent(CallInterface $call);
    #endregion
}