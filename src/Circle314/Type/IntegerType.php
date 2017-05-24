<?php

namespace Circle314\Type;

class IntegerType extends NumericType
{
    public function __construct($value, $minValue = null, $maxValue = null)
    {
        parent::__construct(
            (int)$value,
            is_null($minValue) ? null : (int)$minValue,
            is_null($maxValue) ? null : (int)$maxValue
        );
    }
}
