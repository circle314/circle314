<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NullableStringType;

/**
 * @method NullableStringType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableStringTrait
 */
trait RefreshTypeNullableStringTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableStringType($value);
    }
}