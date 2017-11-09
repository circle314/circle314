<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableIntegerType;

/**
 * @method NullableIntegerType typedValue()
 */
trait RefreshTypeNullableIntegerSmallPositiveTrait
{
    /**
     * A new NullableIntegerType, with a minimum value of 1 and maximum value of 32767.
     *
     * @param $value
     * @return NullableIntegerType
     */
    protected function refreshTypedValue($value)
    {
        return new NullableIntegerType($value, 1, 32767);
    }
}