<?php

namespace Circle314\Component\Data\ValueObject\Collection;

use Circle314\Component\Collection\AbstractKeyedCollection;
use Circle314\Transitional\TransitionalDVOInterface;

abstract class AbstractDVOCollection extends AbstractKeyedCollection implements DVOCollectionInterface
{
    public function __construct(Array $array = [], $overrideSetCollectionClass = true)
    {
        if(is_null($this->collectionClass())) {
            $this->setCollectionClass(TransitionalDVOInterface::class);
        }
        parent::__construct($array);
    }
}
