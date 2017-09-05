<?php

namespace Circle314\Component\Schema\Traits\RefreshType;

use Circle314\Component\Type\NonEmptyStringType;

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