<?php

namespace Circle314\Component\Data\ValueObject;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\ValueObject\Configuration\DVOConfigurationInterface;
use Circle314\Component\Data\ValueObject\Configuration\Native\NativeDVOConfiguration;
use Circle314\Component\Data\ValueObject\Exception\DVOOrderingException;
use Circle314\Component\Type\Exception\TypeValidationException;
use Circle314\Component\Type\TypeInterface\TypeInterface;
use Circle314\Concept\Null\NullConstants;
use Circle314\Concept\Ordering\OrderingConstants;

abstract class AbstractDVO implements DVOInterface
{
    #region Properties
    /** @var DVOConfigurationInterface */
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
    public function __construct($fieldName, DVOConfigurationInterface $dvoConfiguration = null)
    {
        $this->fieldName = $fieldName;
        if(is_null($dvoConfiguration)) {
            $dvoConfiguration = new NativeDVOConfiguration();
            $dvoConfiguration->setReadable();
            $dvoConfiguration->setWriteable();
        }
        $this->configuration = $dvoConfiguration;
    }
    #endregion

    #region Public Methods
    /**
     * @throws TypeValidationException
     */
    final public function applyDefaultValue() : void
    {
        if(!$this->hasDefaultValue()) {
            throw new TypeValidationException('Could not set default value, as "' . $this->fieldName() . '" does not have a default value');
        } else {
            $this->setValue($this->getDefaultValue());
            $this->markAsUpdated();
        }
    }

    public function fieldName() : string
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
    final public function hasDefaultValue() : bool
    {
        return ($this->getDefaultValue() !== NullConstants::NO_DEFAULT_VALUE);
    }

    /**
     * @return string
     */
    final public function ID() : string
    {
        return $this->fieldName();
    }

    /**
     * @return TypeInterface
     */
    final public function identifiedValue() : TypeInterface
    {
        return $this->identifiedValue;
    }

    /**
     * @param $value mixed
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     */
    final public function identifyValue($value = NullConstants::NON_EXISTENT_PARAMETER) : void
    {
        try {
            if($value === NullConstants::NON_EXISTENT_PARAMETER) {
                $this->identifiedValue = $this->value;
            } else {
                $this->identifiedValue = $this->refreshTypedValue($value);
            }
            $this->markAsIdentifier();
        } catch (TypeValidationException $e) {
            throw new TypeValidationException('Could not cast value ' . var_export($value, true) . ' to new typed value for DVO "' . $this->fieldName() . '" in ' . static::class);
        }
    }

    /**
     * @return bool
     */
    final public function isMarkedAsIdentifier() : bool
    {
        return $this->markedAsIdentifier;
    }

    /**
     * @return bool
     */
    final public function isMarkedForOrdering() : bool
    {
        return $this->markedAsOrdering;
    }

    /**
     * @return bool
     */
    final public function isMarkedAsUpdated() : bool
    {
        return $this->markedAsUpdated;
    }

    /**
     * @return bool
     */
    public function isReadable() : bool
    {
        return $this->configuration->isReadable();
    }

    /**
     * @return bool
     */
    public function isWriteable() : bool
    {
        return $this->configuration->isWriteable();
    }

    /**
     * @return void
     */
    final public function markAsPersisted() : void
    {
        $this->unmarkAsIdentifier();
        $this->unmarkAsOrdering();
        $this->unmarkAsUpdated();
    }

    /**
     * @param string $orderingDirection
     * @param int $orderingPriority
     * @throws DVOOrderingException
     */
    final public function orderByValue($orderingDirection = OrderingConstants::ASCENDING, $orderingPriority = 1) : void
    {
        if(
            $orderingDirection !== OrderingConstants::ASCENDING
            && $orderingDirection !== OrderingConstants::ASCENDING_NULLS_FIRST
            && $orderingDirection !== OrderingConstants::DESCENDING
            && $orderingDirection !== OrderingConstants::DESCENDING_NULLS_LAST
        ) {
            throw new DVOOrderingException('Attempted to order field "' . $this->fieldName() . '" in unrecognised direction "' . $orderingDirection . '"');
        }
        $this->orderingDirection = $orderingDirection;
        $this->markAsOrdering($orderingPriority);
    }

    final public function orderingDirection() : string
    {
        return $this->orderingDirection;
    }

    /**
     * Returns the TypeInterface object that holds the value of this DVO.
     *
     * @return TypeInterface
     */
    public function typedValue() : TypeInterface
    {
        return $this->value;
    }

    /**
     * @param $value mixed
     * @throws TypeValidationException
     */
    final public function setValue($value) : void
    {
        try {
            $this->value = $this->refreshTypedValue($value);
            $this->markAsUpdated();
        } catch (TypeValidationException $e) {
            throw new TypeValidationException('Could not cast value ' . var_export($value, true) . ' to new typed value for DVO "' . $this->fieldName() . '" in ' . static::class);
        }
    }

    /**
     * @param array $array
     * @param bool $defaultFallback
     * @throws TypeValidationException
     */
    final public function setValueFromArray(Array $array, $defaultFallback = false) : void
    {
        if(array_key_exists($this->fieldName(), $array)) {
            $this->setValue($array[$this->fieldName()]);
        } else if($this->hasDefaultValue() && $defaultFallback) {
            $this->applyDefaultValue();
        }
    }

    /**
     * @param KeyedCollectionInterface $collection
     */
    final public function setValueFromKeyedCollection(KeyedCollectionInterface $collection) : void
    {
        if($collection->hasID($this->fieldName())) {
            $this->setValue($collection->getID($this->fieldName()));
        } else if($this->hasDefaultValue()) {
            $this->applyDefaultValue();
        }
    }
    #endregion

    #region Protected Methods
    final protected function markAsIdentifier() : void
    {
        $this->markedAsIdentifier = true;
    }

    final protected function markAsOrdering($orderingPriority) : void
    {
        $this->markedAsOrdering = $orderingPriority;
    }

    final protected function markAsUpdated() : void
    {
        $this->markedAsUpdated = true;
    }

    final protected function unmarkAsIdentifier() : void
    {
        $this->markedAsIdentifier = false;
    }

    final protected function unmarkAsOrdering() : void
    {
        $this->markedAsOrdering = false;
    }

    final protected function unmarkAsUpdated() : void
    {
        $this->markedAsUpdated = false;
    }
    #endregion

    #region Abstract Methods
    abstract public function getDefaultValue();
    abstract protected function refreshTypedValue($value) : TypeInterface;
    #endregion
}
