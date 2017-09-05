<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\BooleanType;

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