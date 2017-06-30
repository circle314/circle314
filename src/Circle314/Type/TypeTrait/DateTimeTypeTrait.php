<?php

namespace Circle314\Type\TypeTrait;

use \DateTime;
use \Exception;
use Circle314\Exception\TypeTraitException;

trait DateTimeTypeTrait {
    private function validateDateTime($value) {
        try {
            if(
                is_a($value, DateTime::class)
                || is_null($value)
            ) {
                // Correct type, no need to attempt conversion
            } else {
                if(
                    ((string)(int)$value === $value)
                    && ($value <= PHP_INT_MAX)
                    && ($value >= ~PHP_INT_MAX)
                ) {
                    // UNIX Timestamp as a string
                    new DateTime(date("c", $value));
                } else if(
                    ((int)$value === $value)
                    && ($value <= PHP_INT_MAX)
                    && ($value >= ~PHP_INT_MAX)
                ) {
                    // UNIX Timestamp as an integer
                    new DateTime(date("c", (int)$value));
                } else {
                    // Try making a DateTime with whatever remains
                    new DateTime($value);
                }
            }
        } catch (Exception $e) {
            throw new TypeTraitException('Attempted to pass non-date[time] value to date[time] type');
        }
    }
}

?>