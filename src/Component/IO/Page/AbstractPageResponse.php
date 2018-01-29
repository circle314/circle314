<?php

namespace Circle314\Component\IO\Page;

use Circle314\Component\IO\Response\AbstractResponse;
use Circle314\Component\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;

/**
 * @method SuperGlobalRepositoryInterface parameterSet()
 */
abstract class AbstractPageResponse extends AbstractResponse implements PageResponseInterface
{
    public function __construct(SuperGlobalRepositoryInterface $superGlobalRepository)
    {
        parent::__construct($superGlobalRepository);
    }
}
