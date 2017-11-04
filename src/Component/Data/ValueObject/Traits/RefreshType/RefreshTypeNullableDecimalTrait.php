<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

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