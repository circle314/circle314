<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableNonEmptyStringType;

/**
 * @method NullableNonEmptyStringType typedValue()
 */
trait RefreshTypeNullableNonEmptyStringTrait
{
    /**
     * A new NullableNonEmptyStringType.
     *
     * @param $value
     * @return NullableNonEmptyStringType
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new NullableNonEmptyStringType($value);
    }
}