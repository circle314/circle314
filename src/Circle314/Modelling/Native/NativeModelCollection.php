<?php

namespace Circle314\Modelling\Native;

use Circle314\Modelling\AbstractModelCollection;
use Circle314\Modelling\ModelInterface;

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