<?php

namespace Circle314\Schema\Database;

use Circle314\Schema\AbstractSchema;
use Circle314\Schema\SchemaFieldInterface;

abstract class AbstractDatabaseTableSchema extends AbstractSchema implements DatabaseTableSchemaInterface
{
    #region Public Methods
    final public function markFieldAsIdentifier(SchemaFieldInterface $databaseColumn)
    {
        /** @var DatabaseColumnInterface $databaseColumn */
        $this->fieldsMarkedAsIdentifiers()->addCollectionItem($databaseColumn);
        return $this;
    }

    final public function setFieldValue(DatabaseColumnInterface $databaseColumn, $value)
    {
        $databaseColumn->setValue($value);
        $this->markFieldAsUpdated($databaseColumn);
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
    final protected function getBlankFieldCollection()
    {
        return new DatabaseColumnCollection();
    }

    final protected function markFieldAsUpdated(DatabaseColumnInterface $databaseColumn)
    {
        $this->fieldsMarkedForUpdate()->addCollectionItem($databaseColumn);
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
