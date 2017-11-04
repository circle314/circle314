<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableDateType;

/**
 * @method NullableDateType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDateTrait
 */
trait RefreshTypeNullableDateTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableDateType($value);
    }
}