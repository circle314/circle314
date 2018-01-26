<?php

namespace Circle314\Component\IO\Response;

use Circle314\Component\Collection\CollectionInterface;

interface NestedResponseCollectionInterface extends CollectionInterface
{
    public function getGeneratedResponse($ID);
    public function setGeneratedResponse($ID, $generatedResponse);
}
