<?php

namespace Circle314\Type;

use Circle314\Type\TypeTrait\NonEmptyStringTypeTrait;

class NonEmptyStringType extends StringType
{
    use NonEmptyStringTypeTrait;
    
    public function __construct($value, $minLength = null, $maxLength = null) {
        $this->validateNonEmptyString($value);
        parent::__construct($value, $minLength, $maxLength);
    }
}
