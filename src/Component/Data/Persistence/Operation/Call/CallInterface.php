<?php

namespace Circle314\Component\Data\Persistence\Operation\Call;

use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;

interface CallInterface
{
    public function endPoint() : string;
    public function environment() : string;
    public function parameters() : DVOCollectionInterface;
    public function query();
}