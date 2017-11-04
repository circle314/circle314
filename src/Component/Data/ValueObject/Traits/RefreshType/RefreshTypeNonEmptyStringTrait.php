<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

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