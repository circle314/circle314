<?php

namespace Circle314\Component\RenderableObject\Native;

use Circle314\Component\Collection\CollectionInterface;

interface NestedRenderableObjectCollectionInterface extends CollectionInterface
{
    public function getRenderedContent($ID);
    public function setRenderedContent($ID, $renderedContent);
}

?>