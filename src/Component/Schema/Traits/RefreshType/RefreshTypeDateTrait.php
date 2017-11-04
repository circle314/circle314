<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\DateType;

/**
 * @method DateType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeDateTrait
 */
trait RefreshTypeDateTrait
{
    protected function refreshTypedValue($value)
    {
        return new DateType($value);
    }
}