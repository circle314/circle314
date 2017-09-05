<?php

namespace Circle314\Component\ErrorLogging;

abstract class AbstractErrorLogEntry implements ErrorLogEntryInterface
{
    /** @var string */
    private $errorMessage;

    public function __construct($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    protected function errorMessage()
    {
        return $this->errorMessage;
    }

    abstract public function getAsHTML();
    abstract public function getAsText();
}

?>