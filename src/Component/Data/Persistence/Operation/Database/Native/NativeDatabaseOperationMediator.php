<?php

namespace Circle314\Component\Data\Persistence\Operation\Database\Native;

use \PDOStatement;
use Circle314\Component\Data\Persistence\Operation\Response\Database\Native\NativeDatabaseResponse;
use Circle314\Component\Data\Persistence\Operation\Database\AbstractDatabaseOperationMediator;

class NativeDatabaseOperationMediator extends AbstractDatabaseOperationMediator
{
    #region Protected Methods
    /**
     * @param PDOStatement $PDOStatement
     * @return NativeDatabaseResponse
     */
    protected function generateNewResponse(PDOStatement $PDOStatement)
    {
        return new NativeDatabaseResponse($PDOStatement);
    }
    #endregion
}