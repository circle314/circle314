<?php

namespace Circle314\Schema;

use Circle314\Collection\KeyedCollectionItemInterface;
use Circle314\Concept\Value\ValueHandlerInterface;
use Circle314\Type\TypeInterface\TypeInterface;

interface SchemaFieldInterface extends KeyedCollectionItemInterface, ValueHandlerInterface
{
    /**
     * @return string
     */
    public function fieldName();

    /**
     * @return TypeInterface
     */
    public function typedValue();
}
