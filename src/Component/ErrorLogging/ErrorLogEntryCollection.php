<?php

namespace Circle314\Component\ErrorLogging;

use Circle314\Component\Collection\AbstractUnkeyedCollection;

/**
 * Class AbstractNestedRenderableObjectCollection
 * @method ErrorLogEntryInterface[] getArrayCopy()
 * @method ErrorLogEntryInterface current()
 */
class ErrorLogEntryCollection extends AbstractUnkeyedCollection
{
    #region Constructor
    public function __construct()
    {
        $this->setCollectionClass(ErrorLogEntryInterface::class);
        parent::__construct();
    }
    #endregion
}
