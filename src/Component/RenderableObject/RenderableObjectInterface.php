<?php

namespace Circle314\Component\RenderableObject;

use Circle314\Component\RenderableObject\Native\NestedRenderableObjectCollectionInterface;
use Circle314\Component\Type\StringType;

interface RenderableObjectInterface
{
    /**
     * @return NestedRenderableObjectCollectionInterface
     */
    public function &nestedRenderableObjectCollection();

    /**
     * @param StringType $filePath
     * @return string
     */
    public function renderFromFilePath(StringType $filePath);
}
