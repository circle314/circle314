<?php

namespace Circle314\Type;

use Circle314\Type\Primitive\AbstractPrimitiveDateTimeType;
use Circle314\Type\TypeTrait\NonNullableTypeTrait;

class DateType extends AbstractPrimitiveDateTimeType
{
    use NonNullableTypeTrait;

    public function __construct($value) {
        $this->validateNonNullable($value);
        parent::__construct($value);
    }
}
