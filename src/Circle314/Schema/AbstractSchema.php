<?php

namespace Circle314\Schema;

use Circle314\Collection\Exception\CollectionIDDuplicateException;
use Circle314\Collection\KeyedCollectionInterface;

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
    final public function fieldsMarkedForUpdate()
    {
        $fieldsMarkedForUpdate = $this->getBlankFieldCollection();
        /** @var SchemaFieldInterface $field */
        foreach($this->fields as $field) {
            if($field->isMarkedAsUpdated()) {
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
        foreach($this->fields as $field) {
            $field->markAsPersisted();
        }
        return true;
    }
    #endregion

    #region Abstract Methods
    /**
     * @return KeyedCollectionInterface
     */
    abstract protected function getBlankFieldCollection();
    #endregion
}
