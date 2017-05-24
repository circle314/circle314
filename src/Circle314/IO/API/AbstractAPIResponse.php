<?php

namespace Circle314\IO\API;

use Circle314\IO\Response\AbstractResponse;
use Circle314\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;

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

?>