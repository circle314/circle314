<?php

namespace Circle314\Component\Schema;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Concept\Null\NullConstants;
use Circle314\Concept\Ordering\OrderingConstants;
use Circle314\Component\Exception\SchemaFieldException;
use Circle314\Component\Type\Exception\TypeValidationException;
use Circle314\Component\Schema\Native\NativeSchemaFieldConfiguration;
use Circle314\Component\Type\TypeInterface\TypeInterface;

abstract class AbstractSchemaField implements SchemaFieldInterface
{
    #region Properties
    private $configuration;

    /** @var string */
    private $fieldName;

    /** @var TypeInterface */
    private $identifiedValue;

    /** @var bool */
    private $markedAsIdentifier = false;

    /** @var bool */
    private $markedAsOrdering = false;

    /** @var bool */
    private $markedAsUpdated = false;

    /** @var string */
    private $orderingDirection;

    /** @var TypeInterface */
    private $value;
    #endregion

    #region Constructor
    public function __construct($fieldName, SchemaFieldConfigurationInterface $schemaFieldConfiguration = null)
    {
        $this->fieldName = $fieldName;
        if(is_null($schemaFieldConfiguration)) {
            $schemaFieldConfiguration = new NativeSchemaFieldConfiguration();
            $schemaFieldConfiguration->setReadable();
            $schemaFieldConfiguration->setWriteable();
        }
        $this->configuration = $schemaFieldConfiguration;
    }
    #endregion

    #region Public Methods
    /**
     * @throws TypeValidationException
     * @return $this
     */
    final public function applyDefaultValue()
    {
        if(!$this->hasDefaultValue()) {
            throw new TypeValidationException('Could not set default value, as "' . $this->fieldName() . '" does not have a default value');
        } else {
            $this->setValue($this->getDefaultValue());
            $this->markAsUpdated();
        }
        return $this;
    }

    public function fieldName()
    {
        return $this->fieldName;
    }

    public function getValue()
    {
        if(is_null($this->typedValue())) {
            return null;
        } else {
            return $this->typedValue()->getValue();
        }
    }

    /**
     * @return bool
     */
    final public function hasDefaultValue()
    {
        return ($this->getDefaultValue() !== NullConstants::NO_DEFAULT_VALUE);
    }

    /**
     * @return string
     */
    final public function ID()
    {
        return $this->fieldName();
    }

    /**
     * @return TypeInterface
     */
    final public function identifiedValue()
    {
        return $this->identifiedValue;
    }

    /**
     * @param $value mixed
     * @return $this
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     */
    final public function identifyValue($value = NullConstants::NON_EXISTENT_PARAMETER)
    {
        try {
            if($value === NullConstants::NON_EXISTENT_PARAMETER) {
                $this->identifiedValue = $this->value;
            } else {
                $this->identifiedValue = $this->refreshTypedValue($value);
            }
            $this->markAsIdentifier();
            return $this;
        } catch (TypeValidationException $e) {
            throw new TypeValidationException('Could not cast value ' . var_export($value, true) . ' to new typed value for schema field "' . $this->fieldName() . '" in ' . static::class);
        }
    }

    /**
     * @return bool
     */
    final public function isMarkedAsIdentifier()
    {
        return $this->markedAsIdentifier;
    }

    /**
     * @return bool
     */
    final public function isMarkedForOrdering()
    {
        return $this->markedAsOrdering;
    }

    /**
     * @return bool
     */
    final public function isMarkedAsUpdated()
    {
        return $this->markedAsUpdated;
    }

    /**
     * @return bool
     */
    public function isReadable()
    {
        return $this->configuration->isReadable();
    }

    /**
     * @return bool
     */
    public function isWriteable()
    {
        return $this->configuration->isWriteable();
    }

    /**
     * @return void
     */
    final public function markAsPersisted()
    {
        $this->unmarkAsIdentifier();
        $this->unmarkAsOrdering();
        $this->unmarkAsUpdated();
    }

    /**
     * @param string $orderingDirection
     * @param int $orderingPriority
     * @throws SchemaFieldException
     */
    final public function orderByValue($orderingDirection = OrderingConstants::ASCENDING, $orderingPriority = 1)
    {
        if(
            $orderingDirection !== OrderingConstants::ASCENDING
            && $orderingDirection !== OrderingConstants::ASCENDING_NULLS_FIRST
            && $orderingDirection !== OrderingConstants::DESCENDING
            && $orderingDirection !== OrderingConstants::DESCENDING_NULLS_LAST
        ) {
            throw new SchemaFieldException('Attempted to order field "' . $this->fieldName() . '" in unrecognised direction "' . $orderingDirection . '"');
        }
        $this->orderingDirection = $orderingDirection;
        $this->markAsOrdering($orderingPriority);
    }

    final public function orderingDirection()
    {
        return $this->orderingDirection;
    }

    /**
     * Returns the TypeInterface object that holds the value of this SchemaField.
     *
     * @return TypeInterface
     */
    public function typedValue()
    {
        return $this->value;
    }

    /**
     * @param $value mixed
     * @return $this
     * @throws TypeValidationException
     */
    final public function setValue($value)
    {
        try {
            $this->value = $this->refreshTypedValue($value);
            $this->markAsUpdated();
            return $this;
        } catch (TypeValidationException $e) {
            throw new TypeValidationException('Could not cast value ' . var_export($value, true) . ' to new typed value for schema field "' . $this->fieldName() . '" in ' . static::class);
        }
    }

    /**
     * @param array $array
     * @return $this
     * @throws TypeValidationException
     */
    final public function setValueFromArray(Array $array)
    {
        if(array_key_exists($this->fieldName(), $array)) {
            $this->setValue($array[$this->fieldName()]);
        } else if($this->hasDefaultValue()) {
            $this->applyDefaultValue();
        }
        return $this;
    }

    /**
     * @param KeyedCollectionInterface $collection
     * @return $this
     */
    final public function setValueFromKeyedCollection(KeyedCollectionInterface $collection)
    {
        if($collection->hasID($this->fieldName())) {
            $this->setValue($collection->getID($this->fieldName()));
        } else if($this->hasDefaultValue()) {
            $this->applyDefaultValue();
        }
        return $this;
    }
    #endregion

    #region Protected Methods
    final protected function markAsIdentifier()
    {
        $this->markedAsIdentifier = true;
    }

    final protected function markAsOrdering($orderingPriority)
    {
        $this->markedAsOrdering = $orderingPriority;
    }

    final protected function markAsUpdated()
    {
        $this->markedAsUpdated = true;
    }

    final protected function unmarkAsIdentifier()
    {
        $this->markedAsIdentifier = false;
    }

    final protected function unmarkAsOrdering()
    {
        $this->markedAsOrdering = false;
    }

    final protected function unmarkAsUpdated()
    {
        $this->markedAsUpdated = false;
    }
    #endregion

    #region Abstract Methods
    abstract public function getDefaultValue();
    abstract protected function refreshTypedValue($value);
    #endregion
}
