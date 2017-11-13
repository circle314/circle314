<?php

namespace Circle314\Component\Data\Entity\Factory;

use Circle314\Component\Data\Entity\DataEntityInterface;

interface DataEntityFactoryInterface
{
    /**
     * Creates a new DataEntity with unpopulated DataValueObjects
     *
     * @return DataEntityInterface
     */
    public function declare();

    /**
     * Creates a new DataEntity with DataValueObjects populated only with default values
     *
     * @return DataEntityInterface
     */
    public function declareDefault();

    /**
     * Deserializes a DataEntity from a supplied Array
     * <p><p>
     * Deserialization has various side-effects:
     * * Values are written regardless of whether they are write-enabled
     * * Default values are always used where array keys do not exist for the field
     * * After hydration, all values are marked as persisted
     *
     * @param array $array A supplied array in $key => $value format, which will map to DVO->fieldName() => DVO->typedValue()->getValue()
     * @param null|DataEntityInterface $dataEntity The DataEntity to deserialize the array into. If no DataEntity is supplied, the factory will declare a new one.
     * @return DataEntityInterface
     */
    public function deserialize(Array $array = [], ?DataEntityInterface $dataEntity = null);

    /**
     * Initialises a DataEntity from a supplied Array
     * <p><p>
     * Initialisation has various side-effects:
     * * Values are only written  if the field is write-enabled
     * * Default values are used only when they exist and $defaultFallback is set to true
     * * Values are not marked as persisted after hydration
     *
     * @param array $array A supplied array in $key => $value format, which will map to DVO->fieldName() => DVO->typedValue()->getValue()
     * @param bool $defaultFallback Whether missing values will be populated with default values (if they exist)
     * @return DataEntityInterface
     */
    public function initialise(Array $array = [], $defaultFallback);
}