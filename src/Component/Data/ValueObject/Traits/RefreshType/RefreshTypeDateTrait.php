<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

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