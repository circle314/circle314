<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Native;

use Circle314\Component\Data\Persistence\Operation\Cache\Collection\QueryCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\Native\NativeQueryCollection;
use Circle314\Component\Data\Persistence\Operation\Cache\QueryInterface;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;

class NativeQuery implements QueryInterface
{
    #region Properties
    private $ID;

    /** @var QueryCollectionInterface */
    private $responseCollection;
    #endregion

    #region Constructor
    public function __construct($ID, QueryCollectionInterface $responseCollection = null)
    {
        $responseCollection = $responseCollection ?? new NativeQueryCollection();
        $this->responseCollection = $responseCollection;
        $this->ID = $ID;
    }
    #endregion

    #region Public Methods
    /**
     * @param $responseID
     * @return ResponseInterface
     */
    public function getResponse($responseID): ResponseInterface
    {
        return $this->responseCollection->getID($responseID);
    }

    /**
     * @param $responseID
     * @return bool
     */
    public function hasResponse($responseID): bool
    {
        return $this->responseCollection->hasID($responseID);
    }

    public function ID()
    {
        return $this->ID;
    }

    /**
     * @param $responseID
     * @param $response
     */
    public function saveResponse($responseID, $response): void
    {
        $this->responseCollection->saveID($responseID, $response);
    }
    #endregion
}