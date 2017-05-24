<?php

namespace Circle314\Type\Primitive;

use \Exception;
use Circle314\Type\TypeInterface\NumericTypeInterface;
use Circle314\Type\TypeTrait\NumericTypeTrait;

class AbstractPrimitiveNumericType extends AbstractPrimitiveType implements NumericTypeInterface
{
    use NumericTypeTrait;
    
    /** @var integer */
    private $maxValue;

    /** @var integer */
    private $minValue;

    public function __construct($value, $minValue = null, $maxValue = null) {
        $this->validateNumeric($value);
        $this->value = $value;
        $this->maxValue = $maxValue;
        $this->minValue = $minValue;
        parent::__construct($value);
    }

    final public function getMaxValue()
    {
        return $this->maxValue;
    }

    final public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * @return int
     */
    final public function getValue() {
        return $this->value;
    }

    final public function __toString() {
        try {
            return (string)$this->value;
        } catch (Exception $e) {
            trigger_error('Error in ' . __METHOD__ . ' method for ' . __CLASS__);
            return '';
        }
    }

    final public function valueInBounds($value)
    {
        return
            (is_null($this->getMinValue()) || $value >= $this->getMinValue())
            &&
            (is_null($this->getMaxValue()) || $value <= $this->getMaxValue())
        ;
    }
}

?>