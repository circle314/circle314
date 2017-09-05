<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

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