<?php

namespace Circle314\IO\Page;

use Circle314\IO\Command\AbstractCommandHandler;

abstract class AbstractPageCommandHandler extends AbstractCommandHandler implements PageCommandHandlerInterface
{
    #region Constructor
    /**
     * AbstractPageCommandHandler constructor.
     */
    public function __construct()
    {
        $this->commandInterface = PageCommandInterface::class;
        parent::__construct();
    }
    #endregion
}

?>