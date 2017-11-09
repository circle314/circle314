<?php

namespace Circle314\Component\Data\Persistence\Operation\Repository;

use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;

interface OperationRepositoryInterface
{
    /**
     * Gets the Response from the OperationRepository.
     *
     * @param CallInterface $call The Call that generates the Response.
     * @param AccessorInterface $accessor The Accessor that the Call is made against.
     * @return mixed
     */
    public function response(CallInterface $call, AccessorInterface $accessor);
}