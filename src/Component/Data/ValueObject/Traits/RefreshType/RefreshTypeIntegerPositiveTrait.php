<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\IntegerType;

/**
 * @method IntegerType typedValue()
 */
trait RefreshTypeIntegerPositiveTrait
{
    /**
     * A new IntegerType, with minimum value of 1.
     *
     * @param $value
     * @return IntegerType
     */
    protected function refreshTypedValue($value)
    {
        return new IntegerType($value, 1, null);
    }
}