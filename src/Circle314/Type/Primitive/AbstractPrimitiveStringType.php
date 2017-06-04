<?php

namespace Circle314\Type\Primitive;

use \Exception;
use Circle314\Type\TypeInterface\StringTypeInterface;

abstract class AbstractPrimitiveStringType extends AbstractPrimitiveType implements StringTypeInterface
{
    /** @var int */
    private $maxLength;

    /** @var int */
    private $minLength;

    public function __construct($value, $minLength = null, $maxLength = null)
    {
        $this->value = (string)$value;
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        parent::__construct($value);
    }

    final public function getMaxLength()
    {
        return $this->maxLength;
    }

    final public function getMinLength()
    {
        return $this->minLength;
    }

    /**
     * @return string
     */
    final public function getValue()
    {
        return $this->value;
    }

    final public function __toString()
    {
        try {
            return (string)$this->value;
        } catch (Exception $e) {
            trigger_error('Error in ' . __METHOD__ . ' method for ' . __CLASS__);
            return '';
        }
    }

    final public function formatLowerCase()
    {
        return strtolower($this->value);
    }

    final public function formatUpperCase()
    {
        return strtoupper($this->value);
    }

    final protected function valueInBounds($value)
    {
        return is_null($value) || (
            (is_null($this->getMinLength()) || strlen($value) >= $this->getMinLength())
            &&
            (is_null($this->getMaxLength()) || strlen($value) <= $this->getMaxLength())
        );
    }
}
