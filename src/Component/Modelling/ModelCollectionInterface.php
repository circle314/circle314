<?php

namespace Circle314\Component\Modelling;

use Circle314\Component\Collection\KeyedCollectionInterface;

/**
 * @method ModelInterface getID($ID)
 * @method ModelInterface[] getArrayCopy()
 * @method ModelInterface current()
 */
interface ModelCollectionInterface extends KeyedCollectionInterface
{

}

?>