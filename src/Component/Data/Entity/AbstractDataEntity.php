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
    public function className() : string
    {
        return static::class;
    }

    final public function fields() : DVOCollectionInterface
    {
        return $this->fields;
    }

    final public function fieldsMarkedAsIdentifiers() : DVOCollectionInterface
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

    final public function fieldsMarkedForOrdering() : DVOCollectionInterface
    {
        /** @var ArrayIterator $fieldsMarkedForOrdering */
        $fieldsMarkedForOrdering = $this->newDVOCollection();
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedForOrdering()) {
                $fieldsMarkedForOrdering->addCollectionItem($field);
            }
        }
        $fieldsMarkedForOrdering->uasort(function($a, $b) {
            /** @var DVOInterface $a */
            /** @var DVOInterface $b */
            return $a->isMarkedForOrdering() > $b->isMarkedForOrdering();
        });
        return $fieldsMarkedForOrdering;
    }

    final public function fieldsMarkedForUpdate() : DVOCollectionInterface
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

    final public function markFieldsAsPersisted() : void
    {
        /** @var DVOInterface $field */
        foreach($this->fields as $field) {
            $field->markAsPersisted();
        }
    }
    #endregion

    #region Protected Methods
    final protected function configReadOnly() : DVOConfigurationInterface
    {
        $config = new NativeDVOConfiguration();
        $config->setReadable();
        return $config;
    }

    final protected function newDVOCollection() : DVOCollectionInterface
    {
        return new NativeDVOCollection();
    }
    #endregion
}
