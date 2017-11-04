<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\StringType;

/**
 * @method StringType typedValue()
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeStringTrait
 */
trait RefreshTypeStringTrait
{
    protected function refreshTypedValue($value)
    {
        return new StringType($value);
    }
}