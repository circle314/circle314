<?php

namespace Circle314\ErrorLogging;

interface ErrorLoggerConfigurationInterface
{
    public function errorAppendString();
    public function errorLog();
    public function errorPrependString();
    public function errorReporting();
    public function ignoreRepeatedErrors();
    public function logErrors();
    public function logErrorsMaxLen();
}

?>