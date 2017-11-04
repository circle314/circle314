<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableDateTimeType;

/**
 * @method NullableDateTimeType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDateTimeTrait
 */
trait RefreshTypeNullableDateTimeTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableDateTimeType($value);
    }
}