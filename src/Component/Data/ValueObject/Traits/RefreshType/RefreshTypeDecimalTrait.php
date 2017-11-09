<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NumericType;

/**
 * @method NumericType typedValue()
 */
trait RefreshTypeDecimalTrait
{
    /**
     * A new NumericType.
     *
     * @param $value
     * @return NumericType
     */
    protected function refreshTypedValue($value)
    {
        return new NumericType($value);
    }
}