<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\BooleanType;

/**
 * @method BooleanType typedValue()
 */
trait RefreshTypeBooleanTrait
{
    protected function refreshTypedValue($value)
    {
        return new BooleanType($value);
    }
}