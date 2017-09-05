<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

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