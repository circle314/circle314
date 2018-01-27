<?php

namespace Circle314\Component\Data\ValueObject\Collection\Native;

use Circle314\Component\Data\ValueObject\Collection\AbstractDVOCollection;
use Circle314\Component\Data\ValueObject\DVOInterface;

class NativeDVOCollection extends AbstractDVOCollection
{
    #region Constructor
    /**
     * NativeDVOCollection constructor.
     * @param array $array
     * @param bool $overrideSetCollectionClass
     */
    public function __construct(Array $array = [], $overrideSetCollectionClass = true)
    {
        if(!$overrideSetCollectionClass) {
            $this->setCollectionClass(DVOInterface::class);
        }
        parent::__construct($array);
    }
    #endregion
}
