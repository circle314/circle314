<?php

namespace Circle314\Component\Modelling;

use Circle314\Component\Data\Entity\Repository\DataEntityRepositoryInterface;

/**
 * Interface DataModelRepositoryInterface
 * @package Circle314\Component\Modelling
 * @method ModelInterface getID($ID)
 * @method ModelInterface[] getArrayCopy()
 * @method ModelInterface current()
 * @deprecated 0.6
 * @see DataEntityRepositoryInterface
 */
interface ModelRepositoryInterface extends ModelCollectionInterface
{

}
