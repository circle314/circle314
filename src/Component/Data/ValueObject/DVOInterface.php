<?php

namespace Circle314\Component\Data\ValueObject;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Collection\KeyedCollectionItemInterface;
use Circle314\Component\Data\Operator\OperatorInterface;
use Circle314\Component\Type\TypeInterface\TypeInterface;
use Circle314\Concept\Value\ValueInterface;

interface DVOInterface extends KeyedCollectionItemInterface, ValueInterface
{
    /**
     * Adds a filter rule for when the DVO is used to retrieve data via a Persistence Strategy
     *
     * @param OperatorInterface $operator
     * @param $value
     * @since 0.7
     */
    public function addFilterRule(OperatorInterface $operator, $value): void;

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
     * Gets the filter rules applied to the Value Object.
     *
     * @return mixed
     */
    public function filterRules();

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
     * @return bool
     * @since 0.7
     */
    public function hasFilterRules(): bool;

    /**
     * Gets the ID.
     *
     * @return string
     */
    public function ID();

    /**
     * Gets the identifying value, provided the field is used as an identifier.
     *
     * @return TypeInterface
     * @deprecated 0.7
     */
    public function identifiedValue();

    /**
     * Creates a simple filter rule of "equals $value"
     *
     * @param $value
     * @return mixed
     */
    public function identifyValue($value);

    /**
     * Checks whether this field has been marked as an identifier.
     *
     * @return bool
     * @deprecated 0.7
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
     *
     * @internal
     */
    public function markAsPersisted();

    /**
     * Gets the ordering direction for the field, provided the field is marked for ordering.
     *
     * @return string
     */
    public function orderingDirection(): string;

    /**
     * The original value, before any change was made.
     *
     * @return mixed
     */
    public function originalValue();

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
     * Sets the value of the field from a given keyed collection, where the collection is in the format $fieldName => $value
     *
     * @param KeyedCollectionInterface $collection
     * @return mixed
     */
    public function setValueFromKeyedCollection(KeyedCollectionInterface $collection);

    /**
     * Gets the underlying TypedValue of the field.
     *
     * @return TypeInterface
     */
    public function typedValue();
}
