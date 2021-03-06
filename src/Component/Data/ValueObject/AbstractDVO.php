<?php

namespace Circle314\Component\Data\ValueObject;

use Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException;
use Circle314\Component\Data\ValueObject\FilterRule\Native\NativeFilterRule;
use Circle314\Component\Data\ValueObject\FilterRule\Native\NativeFilterRuleCollection;
use \Exception;
use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\Operator\Native\EqualToOperator;
use Circle314\Component\Data\Operator\OperatorInterface;
use Circle314\Component\Data\ValueObject\Configuration\DVOConfigurationInterface;
use Circle314\Component\Data\ValueObject\Configuration\Native\NativeDVOConfiguration;
use Circle314\Component\Data\ValueObject\Exception\DVOOrderingException;
use Circle314\Component\Type\Exception\TypeValidationException;
use Circle314\Component\Type\Exception\ValueOutOfBoundsException;
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

    /** @var NativeFilterRuleCollection */
    private $filterRules;

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
    private $originalValue;

    /** @var TypeInterface */
    private $value;
    #endregion

    #region Constructor
    /**
     * AbstractDVO constructor.
     * @param $fieldName
     * @param DVOConfigurationInterface|null $dvoConfiguration
     */
    public function __construct($fieldName, DVOConfigurationInterface $dvoConfiguration = null)
    {
        $this->fieldName = $fieldName;
        if(is_null($dvoConfiguration)) {
            $dvoConfiguration = new NativeDVOConfiguration();
            $dvoConfiguration->setReadable();
            $dvoConfiguration->setWriteable();
        }
        $this->configuration = $dvoConfiguration;
        $this->filterRules = new NativeFilterRuleCollection();
    }
    #endregion

    #region Public Methods
    /**
     * @inheritdoc
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @since 0.7
     */
    final public function addFilterRule(OperatorInterface $operator, $value): void
    {
        $passedValue = ($value === null ? null : $this->refreshTypedValue($value));
        $this->filterRules->addCollectionItem(
            new NativeFilterRule($operator, $passedValue)
        );
    }

    /**
     * @throws Exception
     * @throws TypeValidationException
     * @throws ValueOutOfBoundsException
     */
    final public function applyDefaultValue()
    {
        if(!$this->hasDefaultValue()) {
            throw new TypeValidationException('Could not set default value, as "' . $this->fieldName() . '" does not have a default value');
        } else {
            $this->setValue($this->getDefaultValue());
            $this->markAsUpdated();
        }
    }

    public function fieldName()
    {
        return $this->fieldName;
    }

    public function filterRules()
    {
        return $this->filterRules;
    }

    public function getValue()
    {
        if(is_null($this->typedValue())) {
            return null;
        } else {
            return $this->typedValue()->getValue();
        }
    }

    final public function hasDefaultValue(): bool
    {
        return ($this->getDefaultValue() !== NullConstants::NO_DEFAULT_VALUE);
    }

    final public function hasFilterRules(): bool
    {
        return $this->filterRules->count() !== 0;
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
     * @deprecated 0.7
     */
    final public function identifiedValue()
    {
        return $this->identifiedValue;
    }

    /**
     * @inheritdoc
     * @throws CollectionExpectedClassMismatchException
     */
    final public function identifyValue($value = NullConstants::NON_EXISTENT_PARAMETER, OperatorInterface $operator = null): void
    {
        try {
            $passedValue = ($value === NullConstants::NON_EXISTENT_PARAMETER) ? $this->value->getValue() : $value;
            $this->addFilterRule(new EqualToOperator(), $passedValue);
        } catch (CollectionExpectedClassMismatchException $e) {
            // There should never be a CollectionExpectedClassMismatchException, as we're calling final functions
            return;
        }
    }

    /**
     * @return bool
     * @deprecated 0.7
     */
    final public function isMarkedAsIdentifier(): bool
    {
        return $this->markedAsIdentifier;
    }

    final public function isMarkedForOrdering(): bool
    {
        return $this->markedAsOrdering;
    }

    final public function isMarkedAsUpdated(): bool
    {
        return $this->markedAsUpdated;
    }

    public function isReadable(): bool
    {
        return $this->configuration->isReadable();
    }

    public function isWriteable(): bool
    {
        return $this->configuration->isWriteable();
    }

    final public function markAsPersisted()
    {
        $this->filterRules->clearCollection();
        $this->unmarkAsOrdering();
        $this->unmarkAsUpdated();
    }

    /**
     * @throws DVOOrderingException
     * @inheritdoc
     */
    final public function orderByValue($orderingDirection = OrderingConstants::ASCENDING, $orderingPriority = 1): void
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

    /**
     * @return string
     */
    final public function orderingDirection(): string
    {
        return $this->orderingDirection;
    }

    /**
     * @return mixed|null
     */
    final public function originalValue()
    {
        if(is_null($this->originalValue)) {
            return null;
        } else {
            return $this->originalValue->getValue();
        }
    }

    /**
     * @param mixed $value
     * @throws Exception
     * @throws TypeValidationException
     * @throws ValueOutOfBoundsException
     */
    final public function setValue($value)
    {
        try {
            if(!is_null($this->value)) {
                $this->originalValue = $this->originalValue ?? $this->value;
            }
            $this->value = $this->refreshTypedValue($value);
            $this->markAsUpdated();
        } catch (TypeValidationException $e) {
            throw new TypeValidationException('Type validation exception occurred when attempting to cast value ' . var_export($value, true) . ' to new typed value for DVO "' . $this->fieldName() . '" in ' . static::class);
        } catch (ValueOutOfBoundsException $e) {
            throw new ValueOutOfBoundsException('Value of out bounds exception occurred when attempting to cast value ' . var_export($value, true) . ' to new typed value for DVO "' . $this->fieldName() . '" in ' . static::class);
        } catch (Exception $e) {
            throw new Exception('Exception occurred when attempting to cast value ' . var_export($value, true) . ' to new typed value for DVO "' . $this->fieldName() . '" in ' . static::class);
        }
    }

    /**
     * @throws TypeValidationException
     * @inheritdoc
     */
    final public function setValueFromArray(Array $array, $defaultFallback = false)
    {
        if(array_key_exists($this->fieldName(), $array)) {
            $this->setValue($array[$this->fieldName()]);
        } else if($this->hasDefaultValue() && $defaultFallback) {
            $this->applyDefaultValue();
        }
    }

    /**
     * @param KeyedCollectionInterface $collection
     * @return mixed|void
     * @throws Exception
     * @throws TypeValidationException
     * @throws ValueOutOfBoundsException
     */
    final public function setValueFromKeyedCollection(KeyedCollectionInterface $collection)
    {
        if($collection->hasID($this->fieldName())) {
            $this->setValue($collection->getID($this->fieldName()));
        } else if($this->hasDefaultValue()) {
            $this->applyDefaultValue();
        }
    }

    /**
     * @return TypeInterface
     */
    public function typedValue()
    {
        return $this->value;
    }
    #endregion

    #region Protected Methods
    /**
     * Flags the field as an ordering field, with a given priority.
     *
     * @param int $orderingPriority The priority in which this ordering will be applied, given there may be ordering from other fields in the downstream query.
     */
    final protected function markAsOrdering($orderingPriority): void
    {
        $this->markedAsOrdering = $orderingPriority;
    }

    /**
     * Flags the field as having been updated.
     */
    final protected function markAsUpdated(): void
    {
        $this->markedAsUpdated = true;
    }

    /**
     * Removes the ordering flag from the field.
     */
    final protected function unmarkAsOrdering(): void
    {
        $this->markedAsOrdering = false;
    }

    /**
     * Removes the updated flag from the field.
     */
    final protected function unmarkAsUpdated(): void
    {
        $this->markedAsUpdated = false;
    }
    #endregion

    #region Abstract Methods
    abstract public function getDefaultValue();

    /**
     * Refreshes the typed value with the new value.
     *
     * @param mixed $value The new value.
     * @throws TypeValidationException
     * @throws ValueOutOfBoundsException
     */
    abstract protected function refreshTypedValue($value);
    #endregion

    #region Magic Methods
    public function __toString()
    {
        return (string)$this->getValue();
    }
    #endregion
}
