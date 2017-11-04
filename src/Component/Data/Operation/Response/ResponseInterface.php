<?php

namespace Circle314\Component\Data\Operation\Response;

/**
 * Interface ResponseInterface
 * @package Circle314\Component\Data\Operation\Response
 * @deprecated 0.6
 * @see \Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface
 */
interface ResponseInterface
{
    /**
     * @return array
     */
    public function result();
}