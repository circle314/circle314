<?php

namespace Circle314\Component\Schema\Database;

use Circle314\Component\Data\Entity\AbstractDataEntity;
use Circle314\Component\Schema\AbstractSchema;

/**
 * Class AbstractDatabaseTableSchema
 * @package Circle314\Component\Schema\Database
 * @deprecated 0.6
 * @see AbstractDataEntity
 */
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
