<?php

namespace Circle314\RenderableObject\Native;

use Circle314\Collection\KeyedCollectionItemInterface;
use Circle314\RenderableObject\RenderableObjectInterface;
use Circle314\Type\TypeInterface\TypeInterface;

interface NestedRenderableObjectCollectionItemInterface extends KeyedCollectionItemInterface
{
    /**
     * @return RenderableObjectInterface
     */
    public function getRenderableObject();

    /**
     * @return TypeInterface
     */
    public function getRenderedContent();

    /**
     * @param mixed $renderedContent
     */
    public function setRenderedContent($renderedContent);

    /**
     * @return string
     */
    public function __toString();
}

?>