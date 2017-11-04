<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\NullableStringType;

/**
 * @method NullableStringType typedValue()
 */
trait RefreshTypeNullableStringTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableStringType($value);
    }
}