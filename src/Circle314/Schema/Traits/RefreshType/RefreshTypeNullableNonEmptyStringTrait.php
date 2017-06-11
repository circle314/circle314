<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NullableNonEmptyStringType;

/**
 * @method NullableNonEmptyStringType typedValue()
 */
trait RefreshTypeNullableNonEmptyStringTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableNonEmptyStringType($value);
    }
}