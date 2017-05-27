<?php

namespace Circle314\Type;

use Circle314\Type\TypeTrait\NonEmptyStringTypeTrait;

class NullableNonEmptyStringType extends NullableStringType
{
    use NonEmptyStringTypeTrait;

    public function __construct($value, $minLength = null, $maxLength = null) {
        if(!is_null($value)) {
            $this->validateNonEmptyString($value);
        }
        parent::__construct($value, $minLength, $maxLength);
    }
}
