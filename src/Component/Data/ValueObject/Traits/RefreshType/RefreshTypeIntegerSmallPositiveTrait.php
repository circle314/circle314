<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\IntegerType;

/**
 * @method IntegerType typedValue()
 */
trait RefreshTypeIntegerSmallPositiveTrait
{
    /**
     * A new IntegerType, with minimum value 1 and maximum value 32767.
     * @param $value
     * @return IntegerType
     */
    protected function refreshTypedValue($value)
    {
        return new IntegerType($value, 1, 32767);
    }
}