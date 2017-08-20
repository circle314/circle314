<?php

namespace Circle314\Type\TypeTrait;

use Circle314\Exception\TypeTraitException;

trait NonZeroNumericTypeTrait {
    private function validateNonZeroNumeric($value) {
        if(is_null($value)) {
            // Nulls are acceptable here
        } else if($value == 0) {
            throw new TypeTraitException('Attempted to pass zero value to non-zero numeric type');
        }
    }
}

?>