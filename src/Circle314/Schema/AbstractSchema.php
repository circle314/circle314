<?php

namespace Circle314\Schema;

use Circle314\Collection\KeyedCollectionInterface;

abstract class AbstractSchema implements SchemaInterface
{
    #region Properties
    /** @var SchemaFieldCollection */
    protected $fieldsMarkedAsIdentifiers;
    /** @var SchemaFieldCollection */
    protected $fieldsMarkedForUpdate;
    #endregion

    #region Constructor
    public function __construct()
    {
        $this->fieldsMarkedAsIdentifiers    = $this->getBlankFieldCollection();
        $this->fieldsMarkedForUpdate        = $this->getBlankFieldCollection();
    }
    #endregion

    #region Public Methods
    public function clearFieldsMarkedForIdentification()
    {
        $this->fieldsMarkedAsIdentifiers()->clearCollection();
    }

    public function clearFieldsMarkedForUpdate()
    {
        $this->fieldsMarkedForUpdate()->clearCollection();
    }

    public function fieldsMarkedAsIdentifiers()
    {
        return $this->fieldsMarkedAsIdentifiers;
    }

    public function fieldsMarkedForUpdate()
    {
        return $this->fieldsMarkedForUpdate;
    }
    #endregion

    #reigon Abstract Methods
    /**
     * @return KeyedCollectionInterface
     */
    abstract protected function getBlankFieldCollection();

    /**
     * @param SchemaFieldInterface $schemaField
     * @return mixed
     */
    abstract public function markFieldAsIdentifier(SchemaFieldInterface $schemaField);
    #endregion
}
