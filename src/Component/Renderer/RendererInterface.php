<?php

namespace Circle314\Component\Renderer;

use Circle314\Component\RenderableObject\RenderableObjectInterface;

interface RendererInterface
{
    /**
     * @param RenderableObjectInterface $renderableObject
     * @return string
     */
    public function render(RenderableObjectInterface $renderableObject);
}

?>