<?php

namespace Circle314\Component\Data\Persistence\Operation\Repository;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;

interface OperationRepositoryInterface
{
    public function response(CallInterface $call, AccessorInterface $accessor);
}