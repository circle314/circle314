<?php

namespace Circle314\Component\Data\ValueObject;

use Circle314\Component\Collection\KeyedCollectionItemInterface;
use Circle314\Component\Type\TypeInterface\TypeInterface;
use Circle314\Concept\Value\ValueInterface;
use Circle314\Transitional\TransitionalDVOInterface;

interface DVOInterface extends KeyedCollectionItemInterface, ValueInterface, TransitionalDVOInterface
{
    public function applyDefaultValue() : void;
    public function fieldName() : string;
    public function getValue();
    public function hasDefaultValue() : bool;
    public function ID() : string;
    public function identifyValue($value) : void;
    public function identifiedValue() : TypeInterface;
    public function isMarkedAsIdentifier() : bool;
    public function isMarkedAsUpdated() : bool;
    public function isMarkedForOrdering() : bool;
    public function isReadable() : bool;
    public function isWriteable() : bool;
    public function markAsPersisted() : void;
    public function orderingDirection() : string;
    public function setValue($value) : void;
    public function setValueFromArray(Array $array, $defaultFallback = false) : void;
    public function typedValue() : TypeInterface;
}
