<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableBooleanType;

/**
 * @method NullableBooleanType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableBooleanTrait
 */
trait RefreshTypeNullableBooleanTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableBooleanType($value);
    }
}