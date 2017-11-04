<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NumericType;

/**
 * @method NumericType typedValue()
 */
trait RefreshTypeDecimalTrait
{
    protected function refreshTypedValue($value)
    {
        return new NumericType($value);
    }
}