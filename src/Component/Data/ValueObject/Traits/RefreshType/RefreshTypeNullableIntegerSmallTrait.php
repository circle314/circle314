<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableIntegerType;

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