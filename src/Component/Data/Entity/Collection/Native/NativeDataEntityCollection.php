<?php

namespace Circle314\Component\Data\Entity\Collection\Native;

use Circle314\Component\Data\Entity\Collection\AbstractDataEntityCollection;
use Circle314\Component\Data\Entity\DataEntityInterface;

/**
 * Class NativeDataEntityCollection
 * @package Circle314\Component\Data\Entity\Collection\Native
 */
class NativeDataEntityCollection extends AbstractDataEntityCollection
{
    public function __construct(Array $models = [])
    {
        if(!$this->collectionClass()) {
            $this->setCollectionClass(DataEntityInterface::class);
        }
        parent::__construct($models);
    }
}