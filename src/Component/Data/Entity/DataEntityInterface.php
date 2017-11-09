<?php

namespace Circle314\Component\Data\Entity;

use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;
use Circle314\Concept\Identification\IdentifiableInterface;
use Circle314\Transitional\TransitionalDataEntityInterface;

interface DataEntityInterface extends IdentifiableInterface, TransitionalDataEntityInterface
{
    /**
     * The class name of the DataEntity.
     *
     * @return string
     */
    public function className();

    /**
     * The DataValueObjects of the DataEntity.
     *
     * @return DVOCollectionInterface
     */
    public function fields();

    /**
     * The DataValueObjects of the DatEntity that have been marked as identifiers
     *
     * @return DVOCollectionInterface
     */
    public function fieldsMarkedAsIdentifiers();

    /**
     * The DataValueObjects of the DatEntity that have been marked for ordering
     *
     * @return DVOCollectionInterface
     */
    public function fieldsMarkedForOrdering();

    /**
     * The DataValueObjects of the DatEntity that have been marked for update
     *
     * @return DVOCollectionInterface
     */
    public function fieldsMarkedForUpdate();

    /**
     * Marks the DataEntity as having been persisted.
     */
    public function markFieldsAsPersisted();
}
