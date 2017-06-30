<?php

namespace Circle314\Schema;

use Circle314\Collection\KeyedCollectionItemInterface;
use Circle314\Concept\Value\ValueHandlerInterface;
use Circle314\Exception\TypeTraitException;
use Circle314\Type\TypeInterface\TypeInterface;

interface SchemaFieldInterface extends KeyedCollectionItemInterface, ValueHandlerInterface
{
    /**
     * @return void
     */
    public function applyDefaultValue();

    /**
     * @return string
     */
    public function fieldName();

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return bool
     */
    public function hasDefaultValue();

    /**
     * @return string
     */
    public function ID();

    /**
     * @param $value
     * @return $this
     */
    public function identifyValue($value);

    /**
     * @return TypeInterface
     */
    public function identifiedValue();

    /**
     * @return bool
     */
    public function isMarkedAsIdentifier();

    /**
     * @return bool
     */
    public function isMarkedAsUpdated();

    /**
     * @return void
     */
    public function markAsPersisted();

    /**
     * @param $value mixed
     * @return $this
     * @throws TypeTraitException
     */
    public function setValue($value);

    /**
     * @param array $array
     * @param $isDataPopulationImperative
     * @return $this
     * @throws TypeTraitException
     */
    public function setValueFromArray(Array $array, $isDataPopulationImperative);

    /**
     * @return TypeInterface
     */
    public function typedValue();
}
