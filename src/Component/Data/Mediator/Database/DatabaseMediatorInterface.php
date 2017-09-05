<?php

namespace Circle314\Component\Data\Mediator\Database;

use Circle314\Component\Collection\CollectionInterface;
use Circle314\Component\Data\Mediator\DataMediatorInterface;
use Circle314\Component\Schema\Database\DatabaseTableSchemaInterface;

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
