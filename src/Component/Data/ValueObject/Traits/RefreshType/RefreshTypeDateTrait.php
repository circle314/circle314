<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\DateType;

/**
 * @method DateType typedValue()
 */
trait RefreshTypeDateTrait
{
    /**
     * A new DateType.
     *
     * @param $value
     * @return DateType
     */
    protected function refreshTypedValue($value)
    {
        return new DateType($value);
    }
}