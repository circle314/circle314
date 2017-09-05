<?php

namespace Circle314\Component\ErrorLogging;

abstract class AbstractErrorLoggerConfiguration implements ErrorLoggerConfigurationInterface
{
    /** @var string */
    private $errorAppendString;

    /** @var string */
    private $errorLog;

    /** @var string */
    private $errorPrependString;

    /** @var int */
    private $errorReporting;

    /** @var int */
    private $ignoreRepeatedErrors;

    /** @var int */
    private $logErrors;

    /** @var int */
    private $logErrorsMaxLen;

    public function __construct(
        $logErrors,
        $errorLog,
        $errorReporting,
        $logErrorsMaxLen,
        $ignoreRepeatedErrors,
        $errorPrependString,
        $errorAppendString
    ) {
        $this->logErrors            = $logErrors;
        $this->errorLog             = $errorLog;
        $this->errorReporting       = $errorReporting;
        $this->logErrorsMaxLen      = $logErrorsMaxLen;
        $this->ignoreRepeatedErrors = $ignoreRepeatedErrors;
        $this->errorPrependString   = $errorPrependString;
        $this->errorAppendString    = $errorAppendString;
    }

    public function errorAppendString()
    {
        return $this->errorAppendString;
    }

    public function errorLog()
    {
        return $this->errorLog;
    }

    public function errorPrependString()
    {
        return $this->errorPrependString;
    }

    public function errorReporting()
    {
        return $this->errorReporting;
    }

    public function ignoreRepeatedErrors()
    {
        return $this->ignoreRepeatedErrors;
    }

    public function logErrors()
    {
        return $this->logErrors;
    }

    public function logErrorsMaxLen()
    {
        return $this->logErrorsMaxLen;
    }
}

?>