<?php

namespace Circle314\Component\IO\API;

use Circle314\Component\IO\Command\AbstractCommand;
use Circle314\Component\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;

/**
 * @method SuperGlobalRepositoryInterface parameterSet()
 */
abstract class AbstractAPICommand extends AbstractCommand implements APICommandInterface
{
    public function __construct(SuperGlobalRepositoryInterface $superGlobalRepository)
    {
        parent::__construct($superGlobalRepository);
    }
}

?>