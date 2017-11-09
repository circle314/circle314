<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache;

use Circle314\Concept\Identification\IdentifiableInterface;

interface EndPointInterface extends IdentifiableInterface
{
    /**
     * Gets an existing Query for the EndPoint.
     *
     * @param $queryID
     * @return QueryInterface
     */
    public function getQuery($queryID);

    /**
     * Whether or not there is an existing Query for the EndPoint.
     *
     * @param $queryID
     * @return bool
     */
    public function hasQuery($queryID);

    /**
     * Saves a Query against the EndPoint.
     *
     * @param $queryID
     * @param $query
     */
    public function saveQuery($queryID, $query);
}