<?php

namespace Circle314\Component\RenderableObject\Native;

use Circle314\Component\Collection\KeyedCollectionItemInterface;
use Circle314\Component\RenderableObject\RenderableObjectInterface;
use Circle314\Component\Type\TypeInterface\TypeInterface;

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