<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Collection;

use Circle314\Component\Collection\AbstractKeyedCollection;
use Circle314\Component\Data\Persistence\Operation\Cache\EndPointInterface;

abstract class AbstractEndPointCollection extends AbstractKeyedCollection implements EndPointCollectionInterface
{
    public function __construct(Array $array = [])
    {
        if(is_null($this->collectionClass())) {
            $this->setCollectionClass(EndPointInterface::class);
        }
        parent::__construct($array);
    }
}