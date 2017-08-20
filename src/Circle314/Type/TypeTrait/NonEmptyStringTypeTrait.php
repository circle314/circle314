<?php

namespace Circle314\Type\TypeTrait;

use Circle314\Exception\TypeTraitException;

trait NonEmptyStringTypeTrait {
    private function validateNonEmptyString($value) {
        if(is_null($value)) {
            // Nulls are acceptable at this stage
        } else if((string)$value === '') {
            throw new TypeTraitException('Attempted to pass empty string value to non-empty string type');
        }
    }
}
