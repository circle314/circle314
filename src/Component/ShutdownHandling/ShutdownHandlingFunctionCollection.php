<?php

namespace Circle314\Component\ShutdownHandling;

use Circle314\Component\Collection\AbstractUnkeyedCollection;

/**
 * Class AbstractNestedRenderableObjectCollection
 * @package Circle314\Component\RenderableObject
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
