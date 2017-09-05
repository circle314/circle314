<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableBooleanType;

/**
 * @method NullableBooleanType typedValue()
 */
trait RefreshTypeNullableBooleanTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableBooleanType($value);
    }
}