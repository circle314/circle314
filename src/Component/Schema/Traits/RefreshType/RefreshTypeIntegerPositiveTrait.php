<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\IntegerType;

/**
 * @method IntegerType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeIntegerPositiveTrait
 */
trait RefreshTypeIntegerPositiveTrait
{
    protected function refreshTypedValue($value)
    {
        return new IntegerType($value, 1, null);
    }
}