<?php

namespace Circle314\Schema\Database;

use Circle314\Schema\AbstractSchema;

abstract class AbstractDatabaseTableSchema extends AbstractSchema implements DatabaseTableSchemaInterface
{
    #region Protected Methods
    /**
     * @return DatabaseColumnCollection
     */
    final protected function getBlankFieldCollection()
    {
        return new DatabaseColumnCollection();
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
