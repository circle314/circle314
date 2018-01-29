<?php

namespace Circle314\Component\IO\Response;

interface ResponseInterface
{
    /** @return NestedResponseCollectionInterface */
    public function &nestedResponseCollection();
    public function processResponse();
}
