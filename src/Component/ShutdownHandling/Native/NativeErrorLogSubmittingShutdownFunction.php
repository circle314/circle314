<?php

namespace Circle314\Component\ShutdownHandling\Native;

use Circle314\Component\ShutdownHandling\AbstractShutdownHandlingFunction;
use Circle314\Component\ErrorLogging\ErrorLoggerInterface;

class NativeErrorLogSubmittingShutdownFunction extends AbstractShutdownHandlingFunction
{
    #region Properties
    /** @var ErrorLoggerInterface */
    private $errorLogger;
    #endregion

    #region Constructor
    public function __construct(
        ErrorLoggerInterface    $errorLogger
    ) {
        $this->errorLogger      = $errorLogger;
    }
    #endregion

    #region Public Methods
    public function handleShutdown()
    {
        $this->errorLogger()->processErrorLog();
    }
    #endregion

    #region Protected Methods
    protected function errorLogger()
    {
        return $this->errorLogger;
    }
    #endregion
}
