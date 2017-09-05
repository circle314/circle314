<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

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