<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableDateType;

/**
 * @method NullableDateType typedValue()
 */
trait RefreshTypeNullableDateTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableDateType($value);
    }
}