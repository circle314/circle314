<?php

namespace Circle314\Component\Data\Entity\Collection;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\Entity\DataEntityInterface;

/**
 * @method DataEntityInterface getID($ID)
 * @method DataEntityInterface[] getArrayCopy()
 * @method DataEntityInterface current()
 */
interface DataEntityCollectionInterface extends KeyedCollectionInterface
{

}