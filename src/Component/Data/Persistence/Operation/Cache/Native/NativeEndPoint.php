<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Native;

use Circle314\Component\Data\Persistence\Operation\Cache\Collection\QueryCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Collection\Native\NativeQueryCollection;
use Circle314\Component\Data\Persistence\Operation\Cache\EndPointInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\QueryInterface;

class NativeEndPoint implements EndPointInterface
{
    #region Properties
    private $ID;

    /** @var QueryCollectionInterface */
    private $queryCollection;
    #endregion

    #region Constructor
    public function __construct($ID, QueryCollectionInterface $queryCollection = null)
    {
        $queryCollection = $queryCollection ?? new NativeQueryCollection();
        $this->queryCollection = $queryCollection;
        $this->ID = $ID;
    }
    #endregion

    #region Public Methods
    /**
     * @param $queryID
     * @return QueryInterface
     */
    public function getQuery($queryID): QueryInterface
    {
        return $this->queryCollection->getID($queryID);
    }

    /**
     * @param $queryID
     * @return bool
     */
    public function hasQuery($queryID): bool
    {
        return $this->queryCollection->hasID($queryID);
    }

    public function ID()
    {
        return $this->ID;
    }

    /**
     * @param $queryID
     * @param $query
     */
    public function saveQuery($queryID, $query): void
    {
        $this->queryCollection->saveID($queryID, $query);
    }
    #endregion
}