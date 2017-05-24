<?php

namespace Circle314\Type;

use Circle314\Type\TypeTrait\NonZeroNumericTypeTrait;

class NullableNonZeroIntegerType extends NullableIntegerType
{
    use NonZeroNumericTypeTrait;

    public function __construct($value, $minValue = null, $maxValue = null)
    {
        $this->validateNonZeroNumeric($value);
        parent::__construct($value, $minValue, $maxValue);
    }
}
