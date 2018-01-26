<?php

namespace Circle314\Component\IO\Page;

use Circle314\Component\IO\Response\AbstractResponseHandler;

abstract class AbstractPageResponseHandler extends AbstractResponseHandler implements PageResponseHandlerInterface
{
    #region Constructor
    /**
     * AbstractPageResponseHandler constructor.
     * @throws \Circle314\Component\Exception\IncompleteConstructionException
     */
    public function __construct()
    {
        $this->responseInterface = PageResponseInterface::class;
        parent::__construct();
    }
    #endregion
}
