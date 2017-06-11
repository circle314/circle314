<?php

namespace Circle314\Schema\Traits\RefreshType;

use Circle314\Type\IntegerType;

/**
 * @method IntegerType typedValue()
 */
trait RefreshTypeIntegerSmallTrait
{
    protected function refreshTypedValue($value)
    {
        return new IntegerType($value, -32767, 32767);
    }
}