<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\BooleanType;

/**
 * @method BooleanType typedValue()
 */
trait RefreshTypeBooleanTrait
{
    /**
     * A new BooleanType.
     *
     * @param $value
     * @return BooleanType
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new BooleanType($value);
    }
}