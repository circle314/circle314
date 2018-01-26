<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\IntegerType;

/**
 * @method IntegerType typedValue()
 */
trait RefreshTypeIntegerSmallTrait
{
    /**
     * A new IntegerType, with minimum value -32767 and maximum value 32767.
     *
     * @param $value
     * @return IntegerType
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new IntegerType($value, -32767, 32767);
    }
}