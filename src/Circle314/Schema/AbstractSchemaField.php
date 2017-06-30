<?php

namespace Circle314\Schema;

use Circle314\Concept\Null\NullConstants;
use Circle314\Exception\TypeTraitException;
use Circle314\Type\TypeInterface\TypeInterface;

abstract class AbstractSchemaField implements SchemaFieldInterface
{
    #region Properties
    /** @var string */
    private $fieldName;

    /** @var TypeInterface */
    private $identifiedValue;

    /** @var bool */
    private $markedAsIdentifier = false;

    /** @var bool */
    private $markedAsUpdated = false;

    /** @var TypeInterface */
    private $value;
    #endregion

    #region Constructor
    public function __construct($fieldName)
    {
        $this->fieldName = $fieldName;
    }
    #endregion

    #region Public Methods
    /**
     * @throws TypeTraitException
     * @return $this
     */
    final public function applyDefaultValue()
    {
        if(!$this->hasDefaultValue()) {
            throw new TypeTraitException('Could not set default value, as "' . $this->fieldName() . '" does not have a default value');
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

    /**
     * @return string
     */
    final public function getValue()
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
     * @throws TypeTraitException
     */
    final public function identifyValue($value = NullConstants::NON_EXISTENT_PARAMETER)
    {
        try {
            if($value !== NullConstants::NON_EXISTENT_PARAMETER) {
                $this->identifiedValue = $this->refreshTypedValue($value);
            }
            $this->markAsIdentifier();
            return $this;
        } catch (TypeTraitException $e) {
            throw new TypeTraitException('Could not cast value ' . $value . ' to new typed value for schema field "' . $this->fieldName() . '"" in ' . __CLASS__);
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
    final public function isMarkedAsUpdated()
    {
        return $this->markedAsUpdated;
    }

    /**
     * @return void
     */
    final public function markAsPersisted()
    {
        $this->unmarkAsIdentifier();
        $this->unmarkAsUpdated();
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
     * @throws TypeTraitException
     */
    final public function setValue($value)
    {
        try {
            $this->value = $this->refreshTypedValue($value);
            $this->markAsUpdated();
            return $this;
        } catch (TypeTraitException $e) {
            throw new TypeTraitException('Could not cast value ' . $value . ' to new typed value for schema field "' . $this->fieldName() . '"" in ' . __CLASS__);
        }
    }

    /**
     * @param array $array
     * @param $isDataPopulationImperative
     * @return $this
     * @throws TypeTraitException
     */
    final public function setValueFromArray(Array $array, $isDataPopulationImperative)
    {
        try {
            if(array_key_exists($this->fieldName(), $array)) {
                $this->setValue($array[$this->fieldName()]);
            } else {
                $this->applyDefaultValue();
            }
        } catch(TypeTraitException $e) {
            if($isDataPopulationImperative) {
                throw new TypeTraitException($e);
            }
        }
        return $this;
    }
    #endregion

    #region Protected Methods
    final protected function markAsIdentifier()
    {
        $this->markedAsIdentifier = true;
    }

    final protected function markAsUpdated()
    {
        $this->markedAsUpdated = true;
    }

    final protected function unmarkAsIdentifier()
    {
        $this->markedAsIdentifier = false;
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
