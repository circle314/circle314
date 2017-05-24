<?php

namespace Circle314\IO\Page;

use Circle314\IO\Command\AbstractCommand;
use Circle314\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;

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

?>