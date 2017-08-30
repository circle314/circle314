<?php

namespace Circle314\Type\Primitive;

use \Exception;
use Circle314\Type\TypeInterface\BooleanTypeInterface;

/**
 * Class BooleanType
 * @package Circle314\Type
 */
abstract class AbstractPrimitiveBooleanType extends AbstractPrimitiveType implements BooleanTypeInterface
{
    public function __construct($value) {
        $this->value = is_null($value) ? null : (bool)$value;
        parent::__construct($value);
    }

    public function __toString() {
        if(is_null($this->value)) {
            return (string)null;
        }
        try {
            return $this->value ? 'true' : 'false';
        } catch (Exception $e) {
            trigger_error('Error in ' . __METHOD__ . ' method for ' . static::class);
            return '';
        }
    }

    /**
     * @return bool
     */
    public function getValue()
    {
        return $this->value;
    }

    final public function formatInt()
    {
        return $this->value ? 1 : 0;
    }

    final public function formatYesNo()
    {
        return $this->value ? 'Yes' : 'No';
    }

    final protected function valueInBounds($value)
    {
        return true;
    }
}
