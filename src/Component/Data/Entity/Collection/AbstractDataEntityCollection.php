<?php

namespace Circle314\Component\Data\Entity\Collection;

use Circle314\Component\Collection\AbstractKeyedCollection;
use Circle314\Component\Data\Entity\DataEntityInterface;

abstract class AbstractDataEntityCollection extends AbstractKeyedCollection implements DataEntityCollectionInterface
{
    #region Constructor
    /**
     * AbstractDataEntityCollection constructor.
     * @param array $array
     */
    public function __construct(Array $array = [])
    {
        if(is_null($this->collectionClass())) {
            $this->setCollectionClass(DataEntityInterface::class);
        }
        parent::__construct($array);
    }
    #endregion
}