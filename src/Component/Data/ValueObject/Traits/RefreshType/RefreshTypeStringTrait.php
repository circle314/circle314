<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\StringType;

/**
 * @method StringType typedValue()
 */
trait RefreshTypeStringTrait
{
    protected function refreshTypedValue($value)
    {
        return new StringType($value);
    }
}