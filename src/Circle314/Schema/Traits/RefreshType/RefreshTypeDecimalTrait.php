<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NumericType;

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