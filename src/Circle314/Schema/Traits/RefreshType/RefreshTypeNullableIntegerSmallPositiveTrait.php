<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NullableIntegerType;

/**
 * @method NullableIntegerType typedValue()
 */
trait RefreshTypeNullableIntegerSmallPositiveTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableIntegerType($value, 1, 32767);
    }
}