<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Collection;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\EndPointInterface;

/**
 * @method EndPointInterface getID($ID)
 * @method EndPointInterface[] getArrayCopy()
 * @method EndPointInterface current()
 */
interface EndPointCollectionInterface extends KeyedCollectionInterface
{

}