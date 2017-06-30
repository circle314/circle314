<?php

namespace Circle314\Schema;

interface SchemaInterface
{
    /**
     * @return SchemaFieldCollection
     */
    public function fieldsMarkedAsIdentifiers();

    /**
     * @return SchemaFieldCollection
     */
    public function fieldsMarkedForUpdate();

    /**
     * @return void
     */
    public function markFieldsAsPersisted();
}
