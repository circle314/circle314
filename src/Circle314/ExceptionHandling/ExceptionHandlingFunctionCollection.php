<?php

namespace Circle314\ExceptionHandling;

use Circle314\Collection\AbstractUnkeyedCollection;

/**
 * Class AbstractNestedRenderableObjectCollection
 * @package Circle314\RenderableObject
 * @method ExceptionHandlingFunctionInterface getID($ID)
 * @method ExceptionHandlingFunctionInterface[] getArrayCopy()
 * @method ExceptionHandlingFunctionInterface current()
 */
class ExceptionHandlingFunctionCollection extends AbstractUnkeyedCollection
{
    #region Constructor
    public function __construct()
    {
        $this->setCollectionClass(ExceptionHandlingFunctionInterface::class);
        parent::__construct();
    }
    #endregion
}
