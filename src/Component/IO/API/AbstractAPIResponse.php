<?php

namespace Circle314\Component\IO\API;

use Circle314\Component\IO\Response\AbstractResponse;
use Circle314\Component\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;

/**
 * @method SuperGlobalRepositoryInterface parameterSet()
 */
abstract class AbstractAPIResponse extends AbstractResponse implements APIResponseInterface
{
    public function __construct(SuperGlobalRepositoryInterface $superGlobalRepository)
    {
        parent::__construct($superGlobalRepository);
    }
}
