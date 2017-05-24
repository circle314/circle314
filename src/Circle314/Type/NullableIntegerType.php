<?php

namespace Circle314\Type;

class NullableIntegerType extends NullableNumericType
{
    public function __construct($value, $minValue = null, $maxValue = null)
    {
        parent::__construct(
            is_null($value) ? null : (int)$value,
            is_null($minValue) ? null : (int)$minValue,
            is_null($maxValue) ? null : (int)$maxValue
        );
    }
}
