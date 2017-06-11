<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\StringType;

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