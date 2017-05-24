<?php

namespace Circle314\Type\Primitive;

use \DateTime;
use Circle314\Type\TypeTrait\DateTimeTypeTrait;
use Circle314\Type\TypeInterface\DateTimeTypeInterface;

class AbstractPrimitiveDateTimeType extends AbstractPrimitiveType implements DateTimeTypeInterface
{
    use DateTimeTypeTrait;

    /** @var $value DateTime */
    private $value;

    public function __construct($value) {
        $this->validateDateTime($value);
        $this->value = new DateTime($value);
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

    final public function valueInBounds($value)
    {
        return true;
    }
}

?>