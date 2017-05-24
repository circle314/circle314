<?php

namespace Circle314\Type\TypeInterface;

use Circle314\Concept\Value\ValueGettableInterface;

interface TypeInterface extends ValueGettableInterface
{
    public function __construct($value);
    public function __toString();
    public function valueInBounds($value);
}
