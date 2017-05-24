<?php

namespace Circle314\Type\TypeTrait;

use Circle314\Exception\TypeTraitException;

trait NumericTypeTrait {
    private function validateNumeric($value) {
        if(!is_numeric($value)) {
            throw new TypeTraitException('Attempted to pass non-numeric value to numeric type');
        }
    }
}

?>