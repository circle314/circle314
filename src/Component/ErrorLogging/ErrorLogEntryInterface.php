<?php

namespace Circle314\Component\ErrorLogging;

use Circle314\Component\Collection\CollectionItemInterface;

interface ErrorLogEntryInterface extends CollectionItemInterface
{
    public function getAsHTML();
    public function getAsText();
}
