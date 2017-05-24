<?php

namespace Circle314\Schema\Database;

use Circle314\Schema\SchemaInterface;

interface DatabaseTableSchemaInterface extends SchemaInterface
{
    /**
     * @return string
     */
    public function databaseSchemaName();

    /**
     * @return bool
     */
    public function deleteQueriesAllowed();

    /**
     * @return DatabaseColumnCollection
     */
    public function fieldsMarkedAsIdentifiers();

    /**
     * @return DatabaseColumnCollection
     */
    public function fieldsMarkedForUpdate();

    /**
     * @return bool
     */
    public function insertQueriesAllowed();

    /**
     * @param DatabaseColumnInterface $databaseColumnColumn
     * @return mixed
     */
    public function markFieldAsIdentifier(DatabaseColumnInterface $databaseColumnColumn);

    /**
     * @return bool
     */
    public function selectQueriesAllowed();

    /**
     * @return string
     */
    public function tableNameForReads();

    /**
     * @return string
     */
    public function tableNameForWrites();

    /**
     * @return bool
     */
    public function updateQueriesAllowed();
}

?>