<?php

namespace Circle314\IO\Response;

interface ResponseHandlerInterface
{
    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function handleResponse(ResponseInterface $response);

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function generateResponse(ResponseInterface $response);
}

?>