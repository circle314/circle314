<?php

namespace Circle314\ExceptionHandling\Native;

use Circle314\ErrorLogging\Native\NativeErrorLogEntry;
use Circle314\ExceptionHandling\AbstractExceptionHandlingFunction;
use Exception;
use Circle314\ErrorLogging\ErrorLoggerInterface;

class NativeErrorLoggingExceptionHandlingFunction extends AbstractExceptionHandlingFunction
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
    public function handleException(Exception $e)
    {
        $this->errorLogger()->addErrorLogEntry($this->getExceptionMessageAsErrorLegEntry($e));
        $currentException = $e;
        while($currentException->getPrevious())
        {
            $this->errorLogger()->addErrorLogEntry($this->getExceptionMessageAsErrorLegEntry($currentException->getPrevious()));
            $currentException = $currentException->getPrevious();
        }
    }
    #endregion

    #region Protected Methods
    protected function errorLogger()
    {
        return $this->errorLogger;
    }

    protected function getExceptionMessageAsErrorLegEntry(Exception $e)
    {
        $code         = $e->getCode();
        $message      = $e->getMessage();
        $lineNumber   = $e->getLine();
        $file         = $e->getFile();
        $trace        = $e->getTraceAsString();

        $message =
            PHP_EOL . $message . PHP_EOL .
            '  Exception Code: ' .  $code .         PHP_EOL .
            '  Line Number: ' .     $lineNumber .   PHP_EOL .
            '  File: ' .            $file .         PHP_EOL .
            '  Backtrace: ' .       PHP_EOL .       $trace;

        return new NativeErrorLogEntry($message);
    }
    #endregion
}

?>