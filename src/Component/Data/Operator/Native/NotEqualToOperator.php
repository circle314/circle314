<?php

namespace Circle314\Component\Data\Operator\Native;

use Circle314\Component\Data\Operator\OperatorInterface;

class NotEqualToOperator implements OperatorInterface
{
    public function acceptsNullValues(): bool
    {
        return true;
    }
}