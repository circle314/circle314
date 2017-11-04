<?php

namespace Circle314\Component\Data\Entity\Repository;

use Circle314\Component\Data\Entity\Collection\DataEntityCollectionInterface;
use Circle314\Component\Data\Entity\DataEntityInterface;

interface DataEntityRepositoryInterface
{
    public function createBlank() : DataEntityInterface;
    public function createDefault() : DataEntityInterface;
    public function createFromArray(Array $array = [], $defaultFallback = true) : DataEntityInterface;
    public function delete(DataEntityInterface $dataEntity) : void;
    public function forget(DataEntityInterface $dataEntity) : void;
    public function new(DataEntityInterface $dataEntity) : DataEntityInterface;
    public function retrieveID($ID) : DataEntityInterface;
    public function retrieve(DataEntityInterface $dataEntity) : DataEntityInterface;
    public function retrieveCollection(DataEntityInterface $dataEntityCollection) : DataEntityCollectionInterface;
    public function save(DataEntityInterface $dataEntity) : void;
    public function saveCollection(DataEntityCollectionInterface $dataEntityCollection) : void;
}
