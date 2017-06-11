<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NullableDateTimeType;

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