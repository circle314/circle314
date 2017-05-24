<?php

namespace Circle314\Type\Primitive;

use Circle314\Type\Exception\ValueOutOfBoundsException;
use Circle314\Type\TypeInterface\TypeInterface;

abstract class AbstractPrimitiveType implements TypeInterface
{
    protected $value;

    public function __construct($value)
    {
        if(!$this->valueInBounds($value)) {
            throw new ValueOutOfBoundsException('Value ' . var_export($value) . ' is out of bounds for ' . __CLASS__);
        }
    }
}
