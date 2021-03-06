<?php

namespace Circle314\Component\RenderableObject;

use Circle314\Component\RenderableObject\Native\NativeNestedRenderableObjectCollection;
use Circle314\Component\RenderableObject\Native\NestedRenderableObjectCollectionInterface;
use Circle314\Component\Type\StringType;

abstract class AbstractRenderableObject implements RenderableObjectInterface
{
    #region Properties
    /** @var NestedRenderableObjectCollectionInterface */
    private $nestedRenderableObjectCollection;
    #endregion

    #region Public Methods
    /**
     * @return NativeNestedRenderableObjectCollection|NestedRenderableObjectCollectionInterface
     */
    final public function &nestedRenderableObjectCollection()
    {
        if(is_null($this->nestedRenderableObjectCollection)) {
            $this->nestedRenderableObjectCollection = new NativeNestedRenderableObjectCollection([]);
        }
        return $this->nestedRenderableObjectCollection;
    }

    /**
     * @param StringType $filePath
     * @return string
     */
    final public function renderFromFilePath(StringType $filePath)
    {
        ob_start();
        include($filePath->getValue());
        $returnValue = ob_get_contents();
        ob_end_clean();
        return $returnValue;
    }
    #endregion
}
