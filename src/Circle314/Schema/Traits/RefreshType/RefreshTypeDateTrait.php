<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\DateType;

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