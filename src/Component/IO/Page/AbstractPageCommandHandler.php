<?php

namespace Circle314\Component\IO\Page;

use Circle314\Component\IO\Command\AbstractCommandHandler;

abstract class AbstractPageCommandHandler extends AbstractCommandHandler implements PageCommandHandlerInterface
{
    #region Constructor
    /**
     * AbstractPageCommandHandler constructor.
     * @throws \Circle314\Component\Exception\IncompleteConstructionException
     */
    public function __construct()
    {
        $this->commandInterface = PageCommandInterface::class;
        parent::__construct();
    }
    #endregion
}
