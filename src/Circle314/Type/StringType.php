<?php

namespace Circle314\Type;

use Circle314\Type\Primitive\AbstractPrimitiveStringType;
use Circle314\Type\TypeTrait\NonNullableTypeTrait;

class StringType extends AbstractPrimitiveStringType
{
    use NonNullableTypeTrait;
    
    public function __construct($value, $minLength = null, $maxLength = null)
    {
        $this->validateNonNullable($value);
        parent::__construct($value, $minLength, $maxLength);
    }
}
