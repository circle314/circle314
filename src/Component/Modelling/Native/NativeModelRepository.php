<?php

namespace Circle314\Component\Modelling\Native;

use Circle314\Component\Data\Entity\Repository\AbstractDataEntityRepository;
use Circle314\Component\Modelling\AbstractModelRepository;
use Circle314\Component\Modelling\ModelInterface;

/**
 * Class NativeModelRepository
 * @package Circle314\Component\Modelling\Native
 * @deprecated 0.6
 * @see AbstractDataEntityRepository
 */
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