<?php

namespace Circle314\Component\Data\Persistence\Operation\Cache\Collection;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\QueryInterface;

/**
 * @method QueryInterface getID($ID)
 * @method QueryInterface[] getArrayCopy()
 * @method QueryInterface current()
 */
interface QueryCollectionInterface extends KeyedCollectionInterface
{

}