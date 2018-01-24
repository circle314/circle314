<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableDateTimeType;

/**
 * @method NullableDateTimeType typedValue()
 */
trait RefreshTypeNullableDateTimeTrait
{
    /**
     * @param $value
     * @return NullableDateTimeType
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new NullableDateTimeType($value);
    }
}