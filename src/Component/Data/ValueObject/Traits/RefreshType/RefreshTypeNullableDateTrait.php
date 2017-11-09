<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableDateType;

/**
 * @method NullableDateType typedValue()
 */
trait RefreshTypeNullableDateTrait
{
    /**
     * A new NullableDateType.
     *
     * @param $value
     * @return NullableDateType
     */
    protected function refreshTypedValue($value)
    {
        return new NullableDateType($value);
    }
}