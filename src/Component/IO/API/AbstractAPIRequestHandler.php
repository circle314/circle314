<?php

namespace Circle314\Component\IO\API;

use Circle314\Component\IO\Request\AbstractRequestHandler;

/**
 * @method APICommandHandlerInterface commandHandler()
 * @method APIResponseHandlerInterface responseHandler()
 */
abstract class AbstractAPIRequestHandler extends AbstractRequestHandler implements APIRequestHandlerInterface
{
    #region Constructor
    /**
     * AbstractAPIRequestHandler constructor.
     * @param APICommandHandlerInterface $commandHandler
     * @param APIResponseHandlerInterface $responseHandler
     */
    public function __construct(
        APICommandHandlerInterface     $commandHandler,
        APIResponseHandlerInterface    $responseHandler
    )
    {
        parent::__construct($commandHandler, $responseHandler);
    }
    #endregion
}

?>