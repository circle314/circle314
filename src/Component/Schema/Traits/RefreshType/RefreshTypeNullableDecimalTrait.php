<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableNumericType;

/**
 * @method NullableNumericType typedValue()
 */
trait RefreshTypeNullableDecimalTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableNumericType($value);
    }
}