<?php

namespace Circle314\Component\ErrorHandling;

use Circle314\Component\Collection\AbstractUnkeyedCollection;

/**
 * Class AbstractNestedRenderableObjectCollection
 * @package Circle314\Component\RenderableObject
 * @method ErrorHandlingFunctionInterface[] getArrayCopy()
 * @method ErrorHandlingFunctionInterface current()
 */
class ErrorHandlingFunctionCollection extends AbstractUnkeyedCollection
{
    #region Constructor
    /**
     * ErrorHandlingFunctionCollection constructor.
     */
    public function __construct()
    {
        $this->setCollectionClass(ErrorHandlingFunctionInterface::class);
        parent::__construct();
    }
    #endregion
}
