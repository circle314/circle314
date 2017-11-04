<?php

namespace Circle314\Component\Data\Persistence\Operation\Mediator;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;

interface OperationMediatorInterface
{
    public function forgetEndPoint(CallInterface $call);
    public function forgetEnvironment(CallInterface $call);
    public function forgetQuery(CallInterface $call);
    public function forgetResponse(CallInterface $call);
    public function response(CallInterface $call, AccessorInterface $accessor);
}