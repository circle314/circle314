<?php

namespace Circle314\ErrorLogging\Native;

use Circle314\ErrorLogging\AbstractErrorLogEntry;

class NativeErrorLogEntry extends AbstractErrorLogEntry
{
    public function getAsHTML()
    {
        return str_replace(PHP_EOL, '<br>', $this->errorMessage());
    }

    public function getAsText()
    {
        return str_replace(PHP_EOL, "\n", $this->errorMessage());
    }
}

?>