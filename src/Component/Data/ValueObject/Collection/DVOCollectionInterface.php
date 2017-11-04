<?php

namespace Circle314\Component\Data\ValueObject\Collection;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Transitional\TransitionalDVOCollectionInterface;
use Circle314\Transitional\TransitionalDVOInterface;

/**
 * Interface DVOCollectionInterface
 * @package Circle314\Component\Data\ValueObject\Collection
 * @method TransitionalDVOInterface getID($ID)
 * @method TransitionalDVOInterface[] getArrayCopy()
 * @method TransitionalDVOInterface current()
 */
interface DVOCollectionInterface extends KeyedCollectionInterface, TransitionalDVOCollectionInterface
{

}