<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Collection;

use Circle314\Component\Collection\AbstractKeyedCollection;
use Circle314\Component\Data\Persistence\Operation\Cache\QueryInterface;

abstract class AbstractQueryCollection extends AbstractKeyedCollection implements QueryCollectionInterface
{
    public function __construct(Array $array = [])
    {
        if(is_null($this->collectionClass())) {
            $this->setCollectionClass(QueryInterface::class);
        }
        parent::__construct($array);
    }
}