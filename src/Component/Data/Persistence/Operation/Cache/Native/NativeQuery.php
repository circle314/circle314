<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Native;

use Circle314\Component\Data\Persistence\Operation\Cache\Collection\Native\NativeQueryCollection;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\QueryCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\QueryInterface;

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
    public function getResponse($responseID)
    {
        return $this->responseCollection->getID($responseID);
    }

    public function hasResponse($responseID)
    {
        return $this->responseCollection->hasID($responseID);
    }

    public function ID()
    {
        return $this->ID;
    }

    public function saveResponse($responseID, $response)
    {
        $this->responseCollection->saveID($responseID, $response);
    }
    #endregion
}