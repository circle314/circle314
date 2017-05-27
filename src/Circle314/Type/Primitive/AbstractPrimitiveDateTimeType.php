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
        if(is_a($value, DateTime::class)) {
            $this->value = $value;
        } else {
            $this->value = new DateTime($value);
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

    final public function format($format) {
        return $this->value->format($format);
    }

    final protected function valueInBounds($value)
    {
        return true;
    }
}

?>