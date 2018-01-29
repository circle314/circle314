<?php

namespace Circle314\Component\IO\Response;

use Circle314\Component\Exception\IncompatibleSubtypeException;
use Circle314\Component\Exception\IncompleteConstructionException;

abstract class AbstractResponseHandler implements ResponseHandlerInterface
{
    #region Properties
    /** @var string */
    protected $responseInterface;
    #endregion

    #region Constructor
    /**
     * AbstractResponseHandler constructor.
     * @throws IncompleteConstructionException
     */
    public function __construct()
    {
        if(
            is_null($this->responseInterface)
        ) {
            throw new IncompleteConstructionException();
        }
    }
    #endregion

    #region Public Methods
    /**
     * @param \Circle314\Component\IO\Response\ResponseInterface $response
     * @return mixed
     * @throws IncompatibleSubtypeException
     */
    final public function handleResponse(ResponseInterface $response)
    {
        if(is_subclass_of($response, $this->responseInterface)){
            $this->preProcessResponseCode($response);
            /** @var NestedResponseCollectionItemInterface $nestedResponseCollectionItem */
            foreach($response->nestedResponseCollection() as $nestedResponseCollectionItem) {
                $nestedResponseCollectionItem->setGeneratedResponse(
                    $this->generateResponse($nestedResponseCollectionItem->getResponseObject())
                );
            }
            $returnValue = $this->generateResponse($response);
            $this->postProcessResponseCode($response);
        } else {
            throw new IncompatibleSubtypeException(
                'Unable to handle response.  Incompatible response subtype given.  Expected class of type ' . $this->responseInterface
            );
        }
        return $returnValue;
    }
    #endregion

    #region Abstract Methods
    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    abstract protected function preProcessResponseCode(ResponseInterface $response);

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    abstract public function generateResponse(ResponseInterface $response);

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    abstract protected function postProcessResponseCode(ResponseInterface $response);
    #endregion
}
