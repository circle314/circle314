<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\DateTimeType;

/**
 * @method DateTimeType typedValue()
 */
trait RefreshTypeDateTimeTrait
{
    protected function refreshTypedValue($value)
    {
        return new DateTimeType($value);
    }
}