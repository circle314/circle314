<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NullableIntegerType;

/**
 * @method NullableIntegerType typedValue()
 */
trait RefreshTypeNullableIntegerSmallTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableIntegerType($value, -32767, 32767);
    }
}