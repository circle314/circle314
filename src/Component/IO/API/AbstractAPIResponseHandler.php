<?php

namespace Circle314\Component\IO\API;

use Circle314\Component\IO\Response\AbstractResponseHandler;

abstract class AbstractAPIResponseHandler extends AbstractResponseHandler implements APIResponseHandlerInterface
{
    #region Constructor
    /**
     * AbstractAPIResponseHandler constructor.
     * @throws \Circle314\Component\Exception\IncompleteConstructionException
     */
    public function __construct()
    {
        $this->responseInterface = APIResponseInterface::class;
        parent::__construct();
    }
    #endregion
}
