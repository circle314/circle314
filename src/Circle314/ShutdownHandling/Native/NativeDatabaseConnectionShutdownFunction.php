<?php

namespace Circle314\ShutdownHandling\Native;

use Circle314\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\ShutdownHandling\AbstractShutdownHandlingFunction;

class NativeDatabaseConnectionShutdownFunction extends AbstractShutdownHandlingFunction
{
    #region Properties
    public $databaseAccessor;
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
        $this->databaseAccessor->commitTransaction();
        $this->databaseAccessor->dropConnections();
    }
    #endregion
}