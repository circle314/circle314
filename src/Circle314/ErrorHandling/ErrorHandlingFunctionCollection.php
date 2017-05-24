<?php

namespace Circle314\ErrorHandling;

use Circle314\Collection\AbstractUnkeyedCollection;

/**
 * Class AbstractNestedRenderableObjectCollection
 * @package Circle314\RenderableObject
 * @method ErrorHandlingFunctionInterface[] getArrayCopy()
 * @method ErrorHandlingFunctionInterface current()
 */
class ErrorHandlingFunctionCollection extends AbstractUnkeyedCollection
{
    #region Constructor
    public function __construct()
    {
        $this->setCollectionClass(ErrorHandlingFunctionInterface::class);
        parent::__construct();
    }
    #endregion
}

?>