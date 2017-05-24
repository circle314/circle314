<?php

namespace Circle314\IO\Request;

use Circle314\IO\Command\CommandInterface;
use Circle314\IO\Response\ResponseInterface;

interface RequestHandlerInterface
{
    /**
     * @param CommandInterface $command
     * @param \Circle314\IO\Response\ResponseInterface $response
     * @return mixed
     */
    public function handleRequest(CommandInterface $command, ResponseInterface $response);
}

?>