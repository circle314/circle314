<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\DateTimeType;

/**
 * @method DateTimeType typedValue()
 */
trait RefreshTypeDateTimeTrait
{
    /**
     * A new DateTimeType.
     *
     * @param $value
     * @return DateTimeType
     */
    protected function refreshTypedValue($value)
    {
        return new DateTimeType($value);
    }
}