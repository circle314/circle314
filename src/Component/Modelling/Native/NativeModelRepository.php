<?php

namespace Circle314\Component\Modelling\Native;

use Circle314\Component\Modelling\AbstractModelRepository;
use Circle314\Component\Modelling\ModelInterface;

class NativeModelRepository extends AbstractModelRepository
{
    public function __construct(Array $models = [])
    {
        if(!$this->collectionClass()) {
            $this->setCollectionClass(ModelInterface::class);
        }
        parent::__construct($models);
    }
}