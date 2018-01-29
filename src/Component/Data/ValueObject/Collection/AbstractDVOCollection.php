<?php

namespace Circle314\Component\Data\ValueObject\Collection;

use Circle314\Component\Collection\AbstractKeyedCollection;
use Circle314\Component\Data\ValueObject\DVOInterface;

abstract class AbstractDVOCollection extends AbstractKeyedCollection implements DVOCollectionInterface
{
    #region Constructor
    /**
     * AbstractDVOCollection constructor.
     * @param array $array
     * @param bool $overrideSetCollectionClass
     */
    public function __construct(Array $array = [], $overrideSetCollectionClass = true)
    {
        if(is_null($this->collectionClass())) {
            $this->setCollectionClass(DVOInterface::class);
        }
        parent::__construct($array);
    }
    #endregion
}
