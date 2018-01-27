<?php

namespace Circle314\Component\ExceptionHandling;

use Circle314\Component\Collection\AbstractUnkeyedCollection;

/**
 * Class AbstractNestedRenderableObjectCollection
 * @package Circle314\Component\RenderableObject
 * @method ExceptionHandlingFunctionInterface getID($ID)
 * @method ExceptionHandlingFunctionInterface[] getArrayCopy()
 * @method ExceptionHandlingFunctionInterface current()
 */
class ExceptionHandlingFunctionCollection extends AbstractUnkeyedCollection
{
    #region Constructor
    /**
     * ExceptionHandlingFunctionCollection constructor.
     */
    public function __construct()
    {
        $this->setCollectionClass(ExceptionHandlingFunctionInterface::class);
        parent::__construct();
    }
    #endregion
}
