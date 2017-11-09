<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableIntegerType;

/**
 * @method NullableIntegerType typedValue()
 */
trait RefreshTypeNullableIntegerPositiveTrait
{
    /**
     * A new NullableIntegerType, with a minimum value of 1.
     *
     * @param $value
     * @return NullableIntegerType
     */
    protected function refreshTypedValue($value)
    {
        return new NullableIntegerType($value, 1, null);
    }
}