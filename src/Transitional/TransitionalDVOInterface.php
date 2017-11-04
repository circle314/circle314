<?php

namespace Circle314\Transitional;

use Circle314\Component\Type\TypeInterface\TypeInterface;

/**
 * Interface TransitionalDVOInterface
 * @package Circle314\Transitional
 * @deprecated
 */
interface TransitionalDVOInterface
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
    public function isMarkedForOrdering();

    /**
     * @return bool
     */
    public function isMarkedAsUpdated();

    /**
     * @return bool
     */
    public function isReadable();

    /**
     * @return bool
     */
    public function isWriteable();

    /**
     * @return void
     */
    public function markAsPersisted();

    /**
     * @return string
     */
    public function orderingDirection();

    /**
     * @param $value mixed
     * @return $this
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     */
    public function setValue($value);

    /**
     * @param array $array
     * @return $this
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     */
    public function setValueFromArray(Array $array);

    /**
     * @return TypeInterface
     */
    public function typedValue();
}