<?php

namespace Circle314\Component\Data\Entity\Repository;

use Circle314\Component\Data\Entity\Collection\DataEntityCollectionInterface;
use Circle314\Component\Data\Entity\DataEntityInterface;

interface DataEntityRepositoryInterface
{
    /**
     * Creates a new unpopulated DataEntity.
     *
     * @return DataEntityInterface
     */
    public function createBlank();

    /**
     * Creates a new DataEntity populated only with default values.
     *
     * @return DataEntityInterface
     */
    public function createDefault();

    /**
     * Creates a new DataEntity populated by values from an array and, optionally, with default values as a fallback.
     *
     * @param array $array The array of field values to be populated in $key => $value format
     * @param bool $defaultFallback Whether or not to use default values as a fallback
     * @return DataEntityInterface
     */
    public function createFromArray(Array $array = [], $defaultFallback = true);

    /**
     * Removes a DataEntity from both the repository and the persistence mechanism
     *
     * @param DataEntityInterface $dataEntity
     */
    public function delete(DataEntityInterface $dataEntity);

    /**
     * Flushes the cache of the repository
     */
    public function flushCache(): void;

    /**
     * Removes a DataEntity from the repository, but not the persistence mechanism.
     *
     * @param DataEntityInterface $dataEntity
     */
    public function forget(DataEntityInterface $dataEntity);

    /**
     * Adds an existing DataEntity to the repository.
     *
     * @param DataEntityInterface $dataEntity
     * @return DataEntityInterface
     */
    public function new(DataEntityInterface $dataEntity);

    /**
     * Retrieves a single DataEntity matching the supplied DataEntity.
     *
     * @param DataEntityInterface $dataEntity
     * @return DataEntityInterface|null
     */
    public function retrieve(DataEntityInterface $dataEntity);

    /**
     * Retrieves a DataEntity matching the ID.
     *
     * @param $ID
     * @return DataEntityInterface|null
     */
    public function retrieveID($ID);

    /**
     * Retrieves a DataEntityCollection matching the supplied DataEntity.
     *
     * @param DataEntityInterface $dataEntity
     * @return DataEntityCollectionInterface
     */
    public function retrieveCollection(DataEntityInterface $dataEntity);

    /**
     * Saves a DataEntity.
     *
     * @param DataEntityInterface $dataEntity
     * @param bool $forceOperation
     */
    public function save(DataEntityInterface $dataEntity, bool $forceOperation = false);

    /**
     * Saves a DataEntityCollection.
     *
     * @param DataEntityCollectionInterface $dataEntityCollection
     * @param bool $forceOperation
     */
    public function saveCollection(DataEntityCollectionInterface $dataEntityCollection, bool $forceOperation = false);
}
