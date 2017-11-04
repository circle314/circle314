<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\DateTimeType;

/**
 * @method DateTimeType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeDateTimeTrait
 */
trait RefreshTypeDateTimeTrait
{
    protected function refreshTypedValue($value)
    {
        return new DateTimeType($value);
    }
}