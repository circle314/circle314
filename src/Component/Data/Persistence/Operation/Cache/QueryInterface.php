<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache;

use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Concept\Identification\IdentifiableInterface;

interface QueryInterface extends IdentifiableInterface
{
    /**
     * Gets an existing Response for the Query.
     *
     * @param $responseID
     * @return ResponseInterface
     */
    public function getResponse($responseID);

    /**
     * Whether or not there is an existing Response for the Query.
     *
     * @param $responseID
     * @return bool
     */
    public function hasResponse($responseID);

    /**
     * Saves a Response against the Query.
     *
     * @param $responseID
     * @param $response
     */
    public function saveResponse($responseID, $response);
}