<?php

namespace Circle314\Component\Data\ValueObject\Traits\RefreshType;

use Circle314\Component\Type\IntegerType;

/**
 * @method IntegerType typedValue()
 */
trait RefreshTypeIntegerTrait
{
    /**
     * A new IntegerType.
     *
     * @param $value
     * @return IntegerType
     */
    protected function refreshTypedValue($value)
    {
        return new IntegerType($value);
    }
}