<?php

namespace Circle314\ShutdownHandling;

use Circle314\Collection\AbstractUnkeyedCollection;

/**
 * Class AbstractNestedRenderableObjectCollection
 * @package Circle314\RenderableObject
 * @method ShutdownHandlingFunctionInterface getID($ID)
 * @method ShutdownHandlingFunctionInterface[] getArrayCopy()
 * @method ShutdownHandlingFunctionInterface current()
 */
class ShutdownHandlingFunctionCollection extends AbstractUnkeyedCollection
{
    #region Constructor
    public function __construct()
    {
        $this->setCollectionClass(ShutdownHandlingFunctionInterface::class);
        parent::__construct();
    }
    #endregion
}
