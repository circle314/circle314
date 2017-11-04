<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableIntegerType;

/**
 * @method NullableIntegerType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableIntegerSmallPositiveTrait
 */
trait RefreshTypeNullableIntegerSmallPositiveTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableIntegerType($value, 1, 32767);
    }
}