<?php

namespace Circle314\RenderableObject\Native;

use Circle314\Collection\CollectionInterface;

interface NestedRenderableObjectCollectionInterface extends CollectionInterface
{
    public function getRenderedContent($ID);
    public function setRenderedContent($ID, $renderedContent);
}

?>