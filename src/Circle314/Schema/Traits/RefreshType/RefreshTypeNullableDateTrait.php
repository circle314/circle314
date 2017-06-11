<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NullableDateType;

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