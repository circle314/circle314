<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\StringType;

/**
 * @method StringType typedValue()
 */
trait RefreshTypeStringTrait
{
    /**
     * A new StringType.
     *
     * @param $value
     * @return StringType
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
     */
    protected function refreshTypedValue($value)
    {
        return new StringType($value);
    }
}