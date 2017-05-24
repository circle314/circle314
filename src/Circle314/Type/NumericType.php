<?php

namespace Circle314\Type;

use Circle314\Type\Primitive\AbstractPrimitiveNumericType;
use Circle314\Type\TypeTrait\NonNullableTypeTrait;

class NumericType extends AbstractPrimitiveNumericType
{
    use NonNullableTypeTrait;

    public function __construct($value, $minValue = null, $maxValue = null)
    {
        $this->validateNonNullable($value);
        parent::__construct($value, $minValue, $maxValue);
    }
}

?>