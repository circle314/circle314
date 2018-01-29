<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\DateType;

/**
 * @method DateType typedValue()
 */
trait RefreshTypeDateTrait
{
    /**
     * A new DateType.
     *
     * @param $value
     * @return DateType
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new DateType($value);
    }
}