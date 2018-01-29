<?php

namespace Circle314\Component\Data\ValueObject\Collection;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\ValueObject\DVOInterface;

/**
 * Interface DVOCollectionInterface
 * @package Circle314\Component\Data\ValueObject\Collection
 * @method DVOInterface getID($ID)
 * @method DVOInterface[] getArrayCopy()
 * @method DVOInterface current()
 */
interface DVOCollectionInterface extends KeyedCollectionInterface
{

}