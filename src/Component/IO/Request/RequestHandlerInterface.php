<?php

namespace Circle314\Component\IO\Request;

use Circle314\Component\IO\Command\CommandInterface;
use Circle314\Component\IO\Response\ResponseInterface;

interface RequestHandlerInterface
{
    /**
     * @param CommandInterface $command
     * @param \Circle314\Component\IO\Response\ResponseInterface $response
     * @return mixed
     */
    public function handleRequest(CommandInterface $command, ResponseInterface $response);
}

?>