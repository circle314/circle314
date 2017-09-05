<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableIntegerType;

/**
 * @method NullableIntegerType typedValue()
 */
trait RefreshTypeNullableIntegerTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableIntegerType($value);
    }
}