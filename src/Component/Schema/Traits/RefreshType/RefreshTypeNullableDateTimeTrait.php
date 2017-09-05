<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableDateTimeType;

/**
 * @method NullableDateTimeType typedValue()
 */
trait RefreshTypeNullableDateTimeTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableDateTimeType($value);
    }
}