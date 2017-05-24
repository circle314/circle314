<?php

namespace Circle314\IO\Page;

use Circle314\IO\Response\AbstractResponse;
use Circle314\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;

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

?>