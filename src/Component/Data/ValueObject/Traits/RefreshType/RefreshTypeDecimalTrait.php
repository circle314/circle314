<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NumericType;

/**
 * @method NumericType typedValue()
 */
trait RefreshTypeDecimalTrait
{
    /**
     * A new NumericType.
     *
     * @param $value
     * @return NumericType
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new NumericType($value);
    }
}