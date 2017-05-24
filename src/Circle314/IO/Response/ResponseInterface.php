<?php

namespace Circle314\IO\Response;

interface ResponseInterface
{
    /** @return NestedResponseCollectionInterface */
    public function &nestedResponseCollection();
    public function processResponse();
}

?>