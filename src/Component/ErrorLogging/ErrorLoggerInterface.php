<?php

namespace Circle314\Component\ErrorLogging;

interface ErrorLoggerInterface
{
    public function addErrorLogEntry(ErrorLogEntryInterface $errorLogEntry);
    public function processErrorLog();
}
