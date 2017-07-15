<?php

namespace Circle314\Schema;

interface SchemaInterface
{
    /**
     * @return string
     */
    public function className();

    /**
     * @return SchemaFieldCollection
     */
    public function fields();

    /**
     * @return SchemaFieldCollection
     */
    public function fieldsMarkedAsIdentifiers();

    /**
     * @return SchemaFieldCollection
     */
    public function fieldsMarkedForOrdering();

    /**
     * @return SchemaFieldCollection
     */
    public function fieldsMarkedForUpdate();

    /**
     * @return void
     */
    public function markFieldsAsPersisted();
}
