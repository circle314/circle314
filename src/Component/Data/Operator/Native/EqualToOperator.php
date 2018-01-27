<?php

namespace Circle314\Component\Data\Operator\Native;

use Circle314\Component\Data\Operator\OperatorInterface;

class EqualToOperator implements OperatorInterface
{
    public function acceptsNullValues(): bool
    {
        return true;
    }
}