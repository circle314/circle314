<?php

namespace Circle314\Component\Data\Operation\Database\Native;

use Circle314\Component\Data\Operation\Response\Database\Native\NativeDatabaseResponse;
use PDOStatement;
use Circle314\Component\Collection\Native\NativeKeyedCollection;
use Circle314\Component\Data\Operation\Call\CallInterface;
use Circle314\Component\Data\Operation\Call\Database\DatabaseCallInterface;
use Circle314\Component\Data\Operation\Database\AbstractDatabaseOperationMediator;

class NativeDatabaseOperationMediator extends AbstractDatabaseOperationMediator
{
    /**
     * @param CallInterface $call
     * @return NativeDatabaseQueryBranch
     */
    protected function generateNewQueryBranch(CallInterface $call)
    {
        /** @var DatabaseCallInterface $call */
        $PDOStatement = $call->getAccessor()->prepareStatement($call->getQuery());
        return new NativeDatabaseQueryBranch($PDOStatement, new NativeKeyedCollection());
    }

    /**
     * /**
     * @param PDOStatement $PDOStatement
     * @return NativeDatabaseResponse
     */
    protected function generateNewResponse(PDOStatement $PDOStatement)
    {
        return new NativeDatabaseResponse($PDOStatement);
    }
}