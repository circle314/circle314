<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NonEmptyStringType;

/**
 * @method NonEmptyStringType typedValue()
 */
trait RefreshTypeNonEmptyStringTrait
{
    /**
     * A new NonEmptyStringType
     * 
     * @param $value
     * @return NonEmptyStringType
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new NonEmptyStringType($value);
    }
}