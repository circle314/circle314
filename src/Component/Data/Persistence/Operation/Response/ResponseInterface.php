<?php

namespace Circle314\Component\Data\Persistence\Operation\Response;

interface ResponseInterface
{
    /**
     * The result generated in the Response.
     *
     * @return mixed
     */
    public function result();
}