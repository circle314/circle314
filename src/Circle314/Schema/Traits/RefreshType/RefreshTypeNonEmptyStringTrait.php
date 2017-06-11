<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\NonEmptyStringType;

/**
 * @method NonEmptyStringType typedValue()
 */
trait RefreshTypeNonEmptyStringTrait
{
    protected function refreshTypedValue($value)
    {
        return new NonEmptyStringType($value);
    }
}