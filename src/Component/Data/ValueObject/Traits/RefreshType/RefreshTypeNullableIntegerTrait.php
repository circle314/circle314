<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableIntegerType;

/**
 * @method NullableIntegerType typedValue()
 */
trait RefreshTypeNullableIntegerTrait
{
    /**
     * A new NullableIntegerType.
     *
     * @param $value
     * @return NullableIntegerType
     */
    protected function refreshTypedValue($value)
    {
        return new NullableIntegerType($value);
    }
}