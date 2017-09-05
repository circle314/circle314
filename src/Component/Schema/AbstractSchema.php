<?php

namespace Circle314\Component\Schema;

use \ArrayIterator;
use Circle314\Component\Collection\Exception\CollectionIDDuplicateException;
use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Schema\Native\NativeSchemaFieldConfiguration;

abstract class AbstractSchema implements SchemaInterface
{
    #region Properties
    /** @var SchemaFieldCollection */
    protected $fields;
    #endregion

    #region Constructor
    public function __construct()
    {
        $this->fields                       = $this->getBlankFieldCollection();
        foreach($this as $key => $value) {
            if($value instanceof SchemaFieldInterface) {
                if($this->fields->hasID($value->ID())) {
                    throw new CollectionIDDuplicateException('Attempted to create a schema containing fields with duplicate field name "' . $value->ID() . '"');
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

    /**
     * @return mixed
     */
    final public function fields()
    {
        return $this->fields;
    }

    /**
     * @return KeyedCollectionInterface
     */
    final public function fieldsMarkedAsIdentifiers()
    {
        $fieldsMarkedForIdentification = $this->getBlankFieldCollection();
        /** @var SchemaFieldInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedAsIdentifier()) {
                $fieldsMarkedForIdentification->addCollectionItem($field);
            }
        }
        return $fieldsMarkedForIdentification;
    }

    /**
     * @return KeyedCollectionInterface
     */
    final public function fieldsMarkedForOrdering()
    {
        /** @var ArrayIterator $fieldsMarkedForOrdering */
        $fieldsMarkedForOrdering = $this->getBlankFieldCollection();
        /** @var SchemaFieldInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedForOrdering()) {
                $fieldsMarkedForOrdering->addCollectionItem($field);
            }
        }
        $fieldsMarkedForOrdering->uasort(function($a, $b) {
            /** @var SchemaFieldInterface $a */
            /** @var SchemaFieldInterface $b */
            return $a->isMarkedForOrdering() > $b->isMarkedForOrdering();
        });
        return $fieldsMarkedForOrdering;
    }

    /**
     * @return KeyedCollectionInterface
     */
    final public function fieldsMarkedForUpdate()
    {
        $fieldsMarkedForUpdate = $this->getBlankFieldCollection();
        /** @var SchemaFieldInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedAsUpdated() && $field->isWriteable()) {
                $fieldsMarkedForUpdate->addCollectionItem($field);
            }
        }
        return $fieldsMarkedForUpdate;
    }

    /**
     * @return bool
     */
    final public function markFieldsAsPersisted()
    {
        /** @var SchemaFieldInterface $field */
        foreach($this->fields as $field) {
            $field->markAsPersisted();
        }
        return true;
    }
    #endregion

    #region Protected Methods
    final protected function configReadOnly()
    {
        $config = new NativeSchemaFieldConfiguration();
        $config->setReadable();
        return $config;
    }
    #endregion

    #region Abstract Methods
    /**
     * @return KeyedCollectionInterface
     */
    abstract protected function getBlankFieldCollection();
    #endregion
}
