<?php

namespace Circle314\IO\Page;

use Circle314\IO\Response\AbstractResponseHandler;

abstract class AbstractPageResponseHandler extends AbstractResponseHandler implements PageResponseHandlerInterface
{
    #region Constructor
    /**
     * AbstractPageResponseHandler constructor.
     */
    public function __construct()
    {
        $this->responseInterface = PageResponseInterface::class;
        parent::__construct();
    }
    #endregion
}

?>