<?php

namespace Circle314\Type\Primitive;

use \DateTime;
use Circle314\Type\TypeTrait\DateTimeTypeTrait;
use Circle314\Type\TypeInterface\DateTimeTypeInterface;

abstract class AbstractPrimitiveDateTimeType extends AbstractPrimitiveType implements DateTimeTypeInterface
{
    use DateTimeTypeTrait;

    public function __construct($value) {
        $this->validateDateTime($value);
        if(
            is_a($value, DateTime::class)
            || is_null($value)
        ) {
            $this->value = $value;
        } else {
            if(
                ((string)(int)$value === $value)
                && ($value <= PHP_INT_MAX)
                && ($value >= ~PHP_INT_MAX)
            ) {
                // UNIX Timestamp as a string
                $this->value = new DateTime(date("c", $value));
            } else if(
                ((int)$value === $value)
                && ($value <= PHP_INT_MAX)
                && ($value >= ~PHP_INT_MAX)
            ) {
                // UNIX Timestamp as an integer
                $this->value = new DateTime(date("c", (int)$value));
            } else {
                // Try making a DateTime with whatever remains
                $this->value = new DateTime($value);
            }
        }
        parent::__construct($value);
    }

    /**
     * @return DateTime
     */
    public function getValue() {
        return $this->value;
    }

    final public function __toString() {
        trigger_error(__CLASS__ . ' objects must use the format($format) method instead of __toString()');
        return '';
    }

    final public function format($format)
    {
        if(is_null($this->value)) {
            return null;
        } else {
            return $this->value->format($format);
        }
    }

    final public function hasPassed(DateTime $dateTime = null)
    {
        $dateTime = $dateTime ?: new DateTime();
        return $this->value < $dateTime;
    }

    final protected function valueInBounds($value)
    {
        return true;
    }
}
