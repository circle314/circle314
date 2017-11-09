<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableDateTimeType;

/**
 * @method NullableDateTimeType typedValue()
 */
trait RefreshTypeNullableDateTimeTrait
{
    /**
     * A new NullableDateTimeType.
     *
     * @param $value
     * @return NullableDateTimeType
     */
    protected function refreshTypedValue($value)
    {
        return new NullableDateTimeType($value);
    }
}