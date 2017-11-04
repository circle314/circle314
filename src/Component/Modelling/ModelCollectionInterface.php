<?php

namespace Circle314\Component\Modelling;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\Entity\Collection\DataEntityCollectionInterface;

/**
 * @method ModelInterface getID($ID)
 * @method ModelInterface[] getArrayCopy()
 * @method ModelInterface current()
 * @deprecated 0.6
 * @see DataEntityCollectionInterface
 */
interface ModelCollectionInterface extends KeyedCollectionInterface
{

}

?>