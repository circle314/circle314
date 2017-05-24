<?php

namespace Circle314\Renderer;

use Circle314\RenderableObject\RenderableObjectInterface;

interface RendererInterface
{
    /**
     * @param RenderableObjectInterface $renderableObject
     * @return string
     */
    public function render(RenderableObjectInterface $renderableObject);
}

?>