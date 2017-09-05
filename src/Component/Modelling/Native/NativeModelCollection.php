<?php

namespace Circle314\Component\Modelling\Native;

use Circle314\Component\Modelling\AbstractModelCollection;
use Circle314\Component\Modelling\ModelInterface;

class NativeModelCollection extends AbstractModelCollection
{
    public function __construct(Array $models = [])
    {
        if(!$this->collectionClass()) {
            $this->setCollectionClass(ModelInterface::class);
        }
        parent::__construct($models);
    }
}