<?php

namespace Circle314\Component\Data\ValueObject;

use Circle314\Component\Collection\KeyedCollectionItemInterface;
use Circle314\Component\Type\TypeInterface\TypeInterface;
use Circle314\Concept\Value\ValueInterface;
use Circle314\Transitional\TransitionalDVOInterface;

interface DVOInterface extends KeyedCollectionItemInterface, ValueInterface, TransitionalDVOInterface
{
    /**
     * Applies a default value.
     */
    public function applyDefaultValue();

    /**
     * Gets the field name.
     *
     * @return string
     */
    public function fieldName();

    /**
     * Gets the value.
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Checks whether it has a default value.
     *
     * @return bool
     */
    public function hasDefaultValue(): bool;

    /**
     * Gets the ID.
     *
     * @return string
     */
    public function ID();

    /**
     * Flags the field as an identifier that identifies the given value.
     *
     * @param $value
     */
    public function identifyValue($value);

    /**
     * Gets the identifying value, provided the field is used as an identifier.
     *
     * @return TypeInterface
     */
    public function identifiedValue();

    /**
     * Checks whether this field has been marked as an identifier.
     *
     * @return bool
     */
    public function isMarkedAsIdentifier(): bool;

    /**
     * Checks whether this field has been updated.
     *
     * @return bool
     */
    public function isMarkedAsUpdated(): bool;

    /**
     * Checks whether this field has been marked for ordering.
     *
     * @return bool
     */
    public function isMarkedForOrdering(): bool;

    /**
     * Checks whether this field is readable
     *
     * @return bool
     */
    public function isReadable(): bool;

    /**
     * Checks whether this field is writeable.
     *
     * @return bool
     */
    public function isWriteable(): bool;

    /**
     * Marks this field as having been persisted.
     */
    public function markAsPersisted();

    /**
     * Gets the ordering direction for the field, provided the field is marked for ordering.
     *
     * @return string
     */
    public function orderingDirection(): string;

    /**
     * Sets the value of the field.
     *
     * @param mixed $value
     */
    public function setValue($value);

    /**
     * Sets the value of the field from a given array, where the array is in the format $fieldName => $value
     *
     * @param array $array
     * @param bool $defaultFallback
     */
    public function setValueFromArray(Array $array, $defaultFallback = false);

    /**
     * Gets the underlying TypedValue of the field.
     *
     * @return TypeInterface
     */
    public function typedValue();
}
