<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NullableIntegerType;

/**
 * @method NullableIntegerType typedValue()
 */
trait RefreshTypeNullableIntegerTrait
{
    protected function refreshTypedValue($value)
    {
        return new NullableIntegerType($value);
    }
}