<?php

namespace Circle314\Schema;

interface SchemaInterface
{
    public function clearFieldsMarkedForIdentification();
    public function clearFieldsMarkedForUpdate();

    /**
     * @return SchemaFieldCollection
     */
    public function fieldsMarkedAsIdentifiers();

    /**
     * @return SchemaFieldCollection
     */
    public function fieldsMarkedForUpdate();

    /**
     * @param SchemaFieldInterface $schemaField
     * @return mixed
     */
    public function markFieldAsIdentifier(SchemaFieldInterface $schemaField);
}
