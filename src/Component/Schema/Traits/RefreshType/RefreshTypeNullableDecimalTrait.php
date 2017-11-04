<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableNumericType;

/**
 * @method NullableNumericType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDecimalTrait
 */
trait RefreshTypeNullableDecimalTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableNumericType($value);
    }
}