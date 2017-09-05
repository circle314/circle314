<?php

namespace Circle314\Component\Schema\Database;

use Circle314\Component\Schema\SchemaInterface;

interface DatabaseTableSchemaInterface extends SchemaInterface
{
    /**
     * @return string
     */
    public function databaseName();

    /**
     * @return string
     */
    public function databaseSchemaName();

    /**
     * @return bool
     */
    public function deleteQueriesAllowed();

    /**
     * @return bool
     */
    public function insertQueriesAllowed();

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