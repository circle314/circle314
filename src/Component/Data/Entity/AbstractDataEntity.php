<?php

namespace Circle314\Component\Data\Entity;

use \ArrayIterator;
use Circle314\Component\Collection\Exception\CollectionIDDuplicateException;
use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;
use Circle314\Component\Data\ValueObject\Collection\Native\NativeDVOCollection;
use Circle314\Component\Data\ValueObject\Configuration\DVOConfigurationInterface;
use Circle314\Component\Data\ValueObject\Configuration\Native\NativeDVOConfiguration;
use Circle314\Component\Data\ValueObject\DVOInterface;

abstract class AbstractDataEntity implements DataEntityInterface
{
    #region Properties
    /** @var NativeDVOCollection */
    protected $fields;
    #endregion

    #region Constructor
    /**
     * AbstractDataEntity constructor.
     * @throws CollectionIDDuplicateException
     */
    public function __construct()
    {
        $this->fields = $this->newDVOCollection();
        foreach($this as $key => $value) {
            if($value instanceof DVOInterface) {
                if($this->fields->hasID($value->ID())) {
                    throw new CollectionIDDuplicateException('Attempted to create a Data Entity containing DVOs with duplicate field name "' . $value->ID() . '"');
                }
                $this->fields->addCollectionItem($value);
            }
        }
    }
    #endregion

    #region Public Methods
    public function className()
    {
        return static::class;
    }

    final public function fields()
    {
        return $this->fields;
    }

    final public function fieldsMarkedAsIdentifiers()
    {
        $fieldsMarkedForIdentification = $this->newDVOCollection();
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedAsIdentifier()) {
                $fieldsMarkedForIdentification->addCollectionItem($field);
            }
        }
        return $fieldsMarkedForIdentification;
    }

    final public function fieldsMarkedForOrdering()
    {
        $fieldsMarkedForOrdering = $this->newDVOCollection();
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedForOrdering()) {
                $fieldsMarkedForOrdering->addCollectionItem($field);
            }
        }
        /** @var ArrayIterator $fieldsMarkedForOrdering */
        $fieldsMarkedForOrdering->uasort(function($a, $b) {
            /** @var DVOInterface $a */
            /** @var DVOInterface $b */
            return $a->isMarkedForOrdering() > $b->isMarkedForOrdering();
        });
        return $fieldsMarkedForOrdering;
    }

    final public function fieldsMarkedForUpdate()
    {
        $fieldsMarkedForUpdate = $this->newDVOCollection();
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedAsUpdated() && $field->isWriteable()) {
                $fieldsMarkedForUpdate->addCollectionItem($field);
            }
        }
        return $fieldsMarkedForUpdate;
    }

    final public function markFieldsAsPersisted()
    {
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            $field->markAsPersisted();
        }
    }
    #endregion

    #region Protected Methods
    /**
     * Returns a native "read-only" DVOConfiguration object.
     *
     * @return DVOConfigurationInterface
     */
    final protected function configReadOnly()
    {
        $config = new NativeDVOConfiguration();
        $config->setReadable();
        return $config;
    }

    /**
     * Returns a native DVOCollection object.
     *
     * @return DVOCollectionInterface
     */
    final protected function newDVOCollection()
    {
        return new NativeDVOCollection();
    }
    #endregion
}
