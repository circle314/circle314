<?php

namespace Circle314\Component\Data\Entity;

use Circle314\Component\Data\ValueObject\Collection\DVOCollectionInterface;
use Circle314\Concept\Identification\IdentifiableInterface;

interface DataEntityInterface extends IdentifiableInterface
{
    #region Public Methods
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
     * @since 0.7
     * @internal
     */
    public function fieldsMarkedForFiltering();

    /**
     * The DataValueObjects of the DatEntity that have been marked as identifiers
     *
     * @return DVOCollectionInterface
     * @deprecated 0.7
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
     * Checks whether there are any filtering rules applied to the Data Entity's Value Objects.
     *
     * @return bool;
     */
    public function hasFilteringRules(): bool;

    /**
     * Checks whether there are any ordering rules applied to the Data Entity's Value Objects.
     *
     * @return bool;
     */
    public function hasOrderingRules(): bool;

    /**
     * Checks whether there are any updated values in Data Entity's Value Objects.
     *
     * @return bool;
     */
    public function hasUpdatedValues(): bool;

    /**
     * Marks the DataEntity as having been persisted.
     */
    public function markFieldsAsPersisted();
    #endregion
}
