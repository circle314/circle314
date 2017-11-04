<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\DateTimeType;

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