<?php

namespace Circle314\Component\IO\API;

use Circle314\Component\IO\Command\AbstractCommandHandler;

abstract class AbstractAPICommandHandler extends AbstractCommandHandler implements APICommandHandlerInterface
{
    #region Constructor
    /**
     * AbstractAPICommandHandler constructor.
     * @throws \Circle314\Component\Exception\IncompleteConstructionException
     */
    public function __construct()
    {
        $this->commandInterface = APICommandInterface::class;
        parent::__construct();
    }
    #endregion
}
