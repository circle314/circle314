<?php

namespace Circle314\Data\Mediator\Database;

use Circle314\Collection\CollectionInterface;
use Circle314\Data\Mediator\DataMediatorInterface;
use Circle314\Schema\Database\DatabaseTableSchemaInterface;

interface DatabaseMediatorInterface extends DataMediatorInterface
{
    /**
     * @return void
     */
    public function clearTableCache();

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return bool
     */
    public function delete($databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return CollectionInterface
     */
    public function get($databaseTableSchema);

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return CollectionInterface
     */
    public function save($databaseTableSchema);
}
