<?php

namespace Circle314\RenderableObject;

use Circle314\RenderableObject\Native\NestedRenderableObjectCollectionInterface;
use Circle314\Type\StringType;

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

?>