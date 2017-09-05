<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\DateType;

/**
 * @method DateType typedValue()
 */
trait RefreshTypeDateTrait
{
    protected function refreshTypedValue($value)
    {
        return new DateType($value);
    }
}