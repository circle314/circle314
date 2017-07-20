<?php

namespace Circle314\Modelling;

use Circle314\Collection\KeyedCollectionInterface;

/**
 * @method ModelInterface getID($ID)
 * @method ModelInterface[] getArrayCopy()
 * @method ModelInterface current()
 */
interface ModelCollectionInterface extends KeyedCollectionInterface
{

}

?>