<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableBooleanType;

/**
 * @method NullableBooleanType typedValue()
 */
trait RefreshTypeNullableBooleanTrait
{
    /**
     * A new NullableBooleanType
     *
     * @param $value
     * @return NullableBooleanType
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new NullableBooleanType($value);
    }
}