<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NullableNumericType;

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