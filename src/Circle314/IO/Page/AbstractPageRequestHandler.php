<?php

namespace Circle314\IO\Page;

use Circle314\IO\Request\AbstractRequestHandler;

/**
 * @method PageCommandHandlerInterface commandHandler()
 * @method PageResponseHandlerInterface responseHandler()
 */
abstract class AbstractPageRequestHandler extends AbstractRequestHandler implements PageRequestHandlerInterface
{
    #region Constructor
    /**
     * AbstractPageRequestHandler constructor.
     * @param PageCommandHandlerInterface $commandHandler
     * @param PageResponseHandlerInterface $responseHandler
     */
    public function __construct(
        PageCommandHandlerInterface     $commandHandler,
        PageResponseHandlerInterface    $responseHandler
    )
    {
        parent::__construct($commandHandler, $responseHandler);
    }
    #endregion
}

?>