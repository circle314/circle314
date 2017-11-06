<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache;

use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Concept\Identification\IdentifiableInterface;

interface QueryInterface extends IdentifiableInterface
{
    public function hasResponse($responseID): bool;
    public function getResponse($responseID): ResponseInterface;
    public function saveResponse($responseID, $response): void;
}