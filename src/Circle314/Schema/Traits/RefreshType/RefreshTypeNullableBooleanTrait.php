<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NullableBooleanType;

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