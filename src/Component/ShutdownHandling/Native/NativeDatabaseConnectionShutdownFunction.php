<?php

namespace Circle314\Component\ShutdownHandling\Native;

use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\ShutdownHandling\AbstractShutdownHandlingFunction;

class NativeDatabaseConnectionShutdownFunction extends AbstractShutdownHandlingFunction
{
    #region Properties
    private $databaseAccessor;
    #endregion

    #region Constructor
    public function __construct(DatabaseAccessorInterface $databaseAccessor)
    {
        $this->databaseAccessor = $databaseAccessor;
    }
    #endregion

    #region Public Methods
    public function handleShutdown()
    {
        $error = error_get_last();
        // Rollback on fatal errors, which don't get caught by error or exception handlers
        if($error['type'] === E_ERROR) {
            $this->databaseAccessor->rollbackTransaction();
        }
        // Otherwise commit the transaction
        else {
            $this->databaseAccessor->commitTransaction();
        }
        $this->databaseAccessor->dropConnections();
    }
    #endregion
}