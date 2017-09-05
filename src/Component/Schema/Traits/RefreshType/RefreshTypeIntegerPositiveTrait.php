<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\IntegerType;

/**
 * @method IntegerType typedValue()
 */
trait RefreshTypeIntegerPositiveTrait
{
    protected function refreshTypedValue($value)
    {
        return new IntegerType($value, 1, null);
    }
}