<?php

namespace Circle314\ErrorLogging;

interface ErrorLoggerInterface
{
    public function addErrorLogEntry(ErrorLogEntryInterface $errorLogEntry);
    public function processErrorLog();
}

?>