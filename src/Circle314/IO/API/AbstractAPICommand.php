<?php

namespace Circle314\IO\API;

use Circle314\IO\Command\AbstractCommand;
use Circle314\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;

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