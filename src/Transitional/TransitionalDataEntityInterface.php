<?php

namespace Circle314\Transitional;

/**
 * Interface TransitionalDataEntityInterface
 * @package Circle314\Transitional
 * @deprecated
 */
interface TransitionalDataEntityInterface
{
    /**
     * @return string
     */
    public function className();

    /**
     * @return TransitionalDVOCollectionInterface
     */
    public function fields();

    /**
     * @return TransitionalDVOCollectionInterface
     */
    public function fieldsMarkedAsIdentifiers();

    /**
     * @return TransitionalDVOCollectionInterface
     */
    public function fieldsMarkedForOrdering();

    /**
     * @return TransitionalDVOCollectionInterface
     */
    public function fieldsMarkedForUpdate();

    /**
     * @return void
     */
    public function markFieldsAsPersisted();
}
