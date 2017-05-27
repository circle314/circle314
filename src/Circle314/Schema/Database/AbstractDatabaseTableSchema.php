<?php

namespace Circle314\Schema\Database;

use Circle314\Concept\Null\NullConstants;
use Circle314\Schema\AbstractSchema;

abstract class AbstractDatabaseTableSchema extends AbstractSchema implements DatabaseTableSchemaInterface
{
    #region Properties
    /** @var DatabaseColumnCollection */
    private $fieldsMarkedAsIdentifiers;

    /** @var DatabaseColumnCollection */
    private $fieldsMarkedForUpdate;
    #endregion

    #region Constructor
    public function __construct()
    {
        $this->fieldsMarkedAsIdentifiers    = new DatabaseColumnCollection();
        $this->fieldsMarkedForUpdate        = new DatabaseColumnCollection();
    }
    #endregion

    #region Public Methods
    public function fieldsMarkedAsIdentifiers()
    {
        return $this->fieldsMarkedAsIdentifiers;
    }

    public function fieldsMarkedForUpdate()
    {
        return $this->fieldsMarkedForUpdate;
    }

    final public function markFieldAsIdentifier(DatabaseColumnInterface $databaseColumn)
    {
        $this->fieldsMarkedAsIdentifiers()->addCollectionItem($databaseColumn);
        return $this;
    }

    final public function setFieldValueFromArray(
        DatabaseColumnInterface $databaseColumn,
        Array                   $array
    )
    {
        if(array_key_exists($databaseColumn->fieldName(), $array))
        {
            $databaseColumn->setValueFromArray($array, true);
        } else {
            $databaseColumn->applyDefaultValue();
        }
        $this->markFieldAsUpdated($databaseColumn);
        return $this;
    }
    #endregion

    #region Protected Methods
    final protected function accessField(DatabaseColumnInterface $field, $value = NullConstants::NON_EXISTENT_PARAMETER)
    {
        if($value !== NullConstants::NON_EXISTENT_PARAMETER) {
            $field->setValue($value);
            $this->markFieldAsUpdated($field);
        }
        return $field;
    }

    final protected function markFieldAsUpdated(DatabaseColumnInterface $databaseColumn)
    {
        $this->fieldsMarkedForUpdate()->addCollectionItem($databaseColumn);
        return $this;
    }
    #endregion

    #region Abstract Methods
    abstract public function databaseName();
    abstract public function databaseSchemaName();
    abstract public function deleteQueriesAllowed();
    abstract public function insertQueriesAllowed();
    abstract public function selectQueriesAllowed();
    abstract public function updateQueriesAllowed();
    abstract public function tableNameForReads();
    abstract public function tableNameForWrites();
    #endregion
}

?>