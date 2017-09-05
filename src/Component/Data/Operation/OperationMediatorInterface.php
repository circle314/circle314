<?php

namespace Circle314\Component\Data\Operation;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Operation\Call\CallInterface;

interface OperationMediatorInterface
{
    /**
     * @param AccessorInterface $accessor
     * @return void
     */
    public function clearAllResultsForAccessor(AccessorInterface $accessor);

    /**
     * @param CallInterface $call
     * @return void
     */
    public function clearInvalidatedOperationResults(CallInterface $call);

    /**
     * @param CallInterface $call
     * @return mixed
     */
    public function getCallResponse(CallInterface $call);
}