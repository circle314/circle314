<?php

namespace Circle314\ErrorLogging;

use Circle314\Collection\CollectionItemInterface;

interface ErrorLogEntryInterface extends CollectionItemInterface
{
    public function getAsHTML();
    public function getAsText();
}

?>