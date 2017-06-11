<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\IntegerType;

/**
 * @method IntegerType typedValue()
 */
trait RefreshTypeIntegerSmallPositiveTrait
{
    protected function refreshTypedValue($value)
    {
        return new IntegerType($value, 1, 32767);
    }
}