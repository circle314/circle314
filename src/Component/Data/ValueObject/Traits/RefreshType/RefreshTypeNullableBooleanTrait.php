<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

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