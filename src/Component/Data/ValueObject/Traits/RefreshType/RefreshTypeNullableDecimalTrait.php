<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableNumericType;

/**
 * @method NullableNumericType typedValue()
 */
trait RefreshTypeNullableDecimalTrait
{
    /**
     * A new NullableNumericType.
     *
     * @param $value
     * @return NullableNumericType
     */
    protected function refreshTypedValue($value)
    {
        return new NullableNumericType($value);
    }
}