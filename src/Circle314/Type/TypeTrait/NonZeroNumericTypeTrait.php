<?php

namespace Circle314\Type\TypeTrait;

use Circle314\Exception\TypeTraitException;

trait NonZeroNumericTypeTrait {
    private function validateNonZeroNumeric($value) {
        if($value == 0) {
            throw new TypeTraitException('Attempted to pass zero value to non-zero numeric type');
        }
    }
}

?>