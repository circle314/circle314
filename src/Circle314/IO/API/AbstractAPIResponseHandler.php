<?php

namespace Circle314\IO\API;

use Circle314\IO\Response\AbstractResponseHandler;

abstract class AbstractAPIResponseHandler extends AbstractResponseHandler implements APIResponseHandlerInterface
{
    #region Constructor
    /**
     * AbstractAPIResponseHandler constructor.
     */
    public function __construct()
    {
        $this->responseInterface = APIResponseInterface::class;
        parent::__construct();
    }
    #endregion
}

?>