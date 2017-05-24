<?php

namespace Circle314\Modelling;

use Circle314\Collection\KeyedCollectionInterface;

/**
 * Interface DataModelRepositoryInterface
 * @package Circle314\Modelling
 * @method ModelInterface getID($ID)
 * @method ModelInterface[] getArrayCopy()
 * @method ModelInterface current()
 */
interface ModelRepositoryInterface extends ModelCollectionInterface, KeyedCollectionInterface
{

}
