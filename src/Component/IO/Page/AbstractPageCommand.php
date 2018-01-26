<?php

namespace Circle314\Component\IO\Page;

use Circle314\Component\IO\Command\AbstractCommand;
use Circle314\Component\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;

/**
 * @method SuperGlobalRepositoryInterface parameterSet()
 */
abstract class AbstractPageCommand extends AbstractCommand implements PageCommandInterface
{
    public function __construct(SuperGlobalRepositoryInterface $superGlobalRepository)
    {
        parent::__construct($superGlobalRepository);
    }
}
