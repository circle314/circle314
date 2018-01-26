<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableIntegerType;

/**
 * @method NullableIntegerType typedValue()
 */
trait RefreshTypeNullableIntegerSmallTrait
{
    /**
     * A new NullableIntegerType, with a minimum value of -32767 and a maximum value of 32767.
     *
     * @param $value
     * @return NullableIntegerType
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new NullableIntegerType($value, -32767, 32767);
    }
}