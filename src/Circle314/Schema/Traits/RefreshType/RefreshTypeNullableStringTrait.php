<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NullableStringType;

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