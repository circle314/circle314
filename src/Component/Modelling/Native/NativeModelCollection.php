<?php

namespace Circle314\Component\Modelling\Native;

use Circle314\Component\Data\Entity\Collection\Native\NativeDataEntityCollection;
use Circle314\Component\Modelling\AbstractModelCollection;
use Circle314\Component\Modelling\ModelInterface;

/**
 * Class NativeModelCollection
 * @package Circle314\Component\Modelling\Native
 * @deprecated 0.6
 * @see NativeDataEntityCollection
 */
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