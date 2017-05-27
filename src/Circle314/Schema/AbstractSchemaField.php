<?php

namespace Circle314\Schema;

use Circle314\Concept\Null\NullConstants;
use Circle314\Exception\TypeTraitException;
use Circle314\Type\TypeInterface\TypeInterface;

abstract class AbstractSchemaField implements SchemaFieldInterface
{
    #region Properties
    /** @var TypeInterface */
    private $value;
    #endregion

    #region Public Methods
    /**
     * @return string
     */
    final public function ID()
    {
        return $this->fieldName();
    }

    final public function getValue()
    {
        if(is_null($this->typedValue())) {
            return null;
        } else {
            return $this->typedValue()->getValue();
        }
    }

    final public function hasDefaultValue()
    {
        return ($this->getDefaultValue() !== NullConstants::NO_DEFAULT_VALUE);
    }

    final public function applyDefaultValue()
    {
        if(!$this->hasDefaultValue()) {
            throw new TypeTraitException('Could not set default value, as this type does not have a default value');
        } else {
            $this->setValue($this->getDefaultValue());
        }
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
            return $this;
        } catch (TypeTraitException $e) {
            throw new TypeTraitException('Could not cast value ' . $value . ' to new typed value in ' . __CLASS__);
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

    /**
     * Returns the TypeInterface object that holds the value of this SchemaField.
     *
     * @return TypeInterface
     */
    public function typedValue()
    {
        return $this->value;
    }
    #endregion

    #region Abstract Methods
    abstract public function fieldName();
    abstract public function getDefaultValue();
    abstract protected function refreshTypedValue($value);
    #endregion
}

?>