<?php

namespace Circle314\Type\TypeTrait;

use Exception;
use \DateTime;
use Circle314\Exception\TypeTraitException;

trait DateTimeTypeTrait {
    private function validateDateTime($value) {
        try {
            new DateTime($value);
        } catch (Exception $e) {
            throw new TypeTraitException('Attempted to pass non-date[time] value to date[time] type');
        }
    }
}

?>