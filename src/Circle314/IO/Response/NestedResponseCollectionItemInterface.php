<?php

namespace Circle314\IO\Response;

use Circle314\Collection\KeyedCollectionItemInterface;
use Circle314\Type\TypeInterface\TypeInterface;

interface NestedResponseCollectionItemInterface extends KeyedCollectionItemInterface
{
    /**
     * @return ResponseInterface
     */
    public function getResponseObject();

    /**
     * @return TypeInterface
     */
    public function getGeneratedResponse();

    /**
     * @param mixed $generatedResponse
     */
    public function setGeneratedResponse($generatedResponse);

    /**
     * @return string
     */
    public function __toString();
}

?>