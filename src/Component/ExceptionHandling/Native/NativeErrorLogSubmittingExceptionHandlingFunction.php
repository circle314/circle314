<?php

namespace Circle314\Component\ExceptionHandling\Native;

use \Throwable;
use Circle314\Component\ExceptionHandling\AbstractExceptionHandlingFunction;
use Circle314\Component\ErrorLogging\ErrorLoggerInterface;

class NativeErrorLogSubmittingExceptionHandlingFunction extends AbstractExceptionHandlingFunction
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
    public function handleException(Throwable $e)
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
