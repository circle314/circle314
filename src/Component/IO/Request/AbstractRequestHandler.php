<?php

namespace Circle314\Component\IO\Request;

use Circle314\Component\IO\Command\CommandHandlerInterface;
use Circle314\Component\IO\Command\CommandInterface;
use Circle314\Component\IO\Response\ResponseHandlerInterface;
use Circle314\Component\IO\Response\ResponseInterface;

abstract class AbstractRequestHandler implements RequestHandlerInterface
{
    #region Properties
    /** @var CommandHandlerInterface */
    private $commandHandler;
    /** @var ResponseHandlerInterface */
    private $responseHandler;
    #endregion

    #region Constructor
    /**
     * AbstractRequestHandler constructor.
     * @param CommandHandlerInterface $commandHandler
     * @param ResponseHandlerInterface $responseHandler
     */
    public function __construct(
        CommandHandlerInterface     $commandHandler,
        ResponseHandlerInterface    $responseHandler
    )
    {
        $this->setCommandHandler($commandHandler);
        $this->setResponseHandler($responseHandler);
    }
    #endregion

    #region Public Methods
    /**
     * @param \Circle314\Component\IO\Command\CommandInterface $command
     * @param \Circle314\Component\IO\Response\ResponseInterface $response
     * @return mixed
     */
    final public function handleRequest(
        CommandInterface        $command,
        ResponseInterface       $response
    )
    {
        $this->preHandleCommandCode();
        $this->commandHandler()->handleCommand($command);
        $this->postHandleCommandCode();
        $this->preHandleResponseCode();
        $returnValue = $this->responseHandler()->handleResponse($response);
        $this->postHandleResponseCode();
        return $returnValue;
    }
    #endregion

    #region Protected Methods
    /**
     * @return CommandHandlerInterface
     */
    protected function commandHandler()
    {
        return $this->commandHandler;
    }

    /**
     * @return ResponseHandlerInterface
     */
    protected function responseHandler()
    {
        return $this->responseHandler;
    }

    /**
     * @param CommandHandlerInterface $commandHandler
     */
    final protected function setCommandHandler(CommandHandlerInterface $commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    /**
     * @param ResponseHandlerInterface $responseHandler
     */
    final protected function setResponseHandler(ResponseHandlerInterface $responseHandler)
    {
        $this->responseHandler = $responseHandler;
    }
    #endregion

    #region Abstract Methods
    /**
     * @return mixed
     */
    abstract protected function postHandleCommandCode();

    /**
     * @return mixed
     */
    abstract protected function postHandleResponseCode();

    /**
     * @return mixed
     */
    abstract protected function preHandleCommandCode();

    /**
     * @return mixed
     */
    abstract protected function preHandleResponseCode();
    #endregion
}
