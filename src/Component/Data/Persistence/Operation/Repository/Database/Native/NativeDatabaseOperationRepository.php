<?php

namespace Circle314\Component\Data\Persistence\Operation\Repository\Database\Native;

use \PDOStatement;
use Circle314\Component\Data\Persistence\Operation\Response\Database\Native\NativeDatabaseResponse;
use Circle314\Component\Data\Persistence\Operation\Repository\Database\AbstractDatabaseOperationRepository;

class NativeDatabaseOperationRepository extends AbstractDatabaseOperationRepository
{
    #region Protected Methods
    protected function generateNewResponse(PDOStatement $PDOStatement)
    {
        return new NativeDatabaseResponse($PDOStatement);
    }
    #endregion
}