<?php

namespace Circle314\Component\Data\Operator\Native;

use Circle314\Component\Data\Operator\OperatorInterface;

class LessThanOrEqualToOperator implements OperatorInterface
{
    public function acceptsNullValues(): bool
    {
        return false;
    }
}