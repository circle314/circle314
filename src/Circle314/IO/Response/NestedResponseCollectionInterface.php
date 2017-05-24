<?php

namespace Circle314\IO\Response;

use Circle314\Collection\CollectionInterface;

interface NestedResponseCollectionInterface extends CollectionInterface
{
    public function getGeneratedResponse($ID);
    public function setGeneratedResponse($ID, $generatedResponse);
}

?>