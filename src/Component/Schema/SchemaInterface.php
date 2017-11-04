<?php

namespace Circle314\Component\Schema;

use Circle314\Component\Data\Entity\DataEntityInterface;
use Circle314\Transitional\TransitionalDataEntityInterface;

/**
 * Interface SchemaInterface
 * @package Circle314\Component\Schema
 * @deprecated 0.6
 * @see DataEntityInterface
 */
interface SchemaInterface extends TransitionalDataEntityInterface
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
