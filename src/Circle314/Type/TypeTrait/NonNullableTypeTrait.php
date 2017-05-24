<?php

namespace Circle314\Type\TypeTrait;

use Circle314\Exception\TypeTraitException;

trait NonNullableTypeTrait {
    private function validateNonNullable($value) {
        if(is_null($value)) {
            throw new TypeTraitException('Attempted to pass null value to non-null type');
        }
    }
}

?>