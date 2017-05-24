<?php

namespace Circle314\Renderer;

use Circle314\RenderableObject\JSRenderableObjectInterface;

interface JSRendererInterface extends RendererInterface
{
    public function cache(JSRenderableObjectInterface $JSRenderableObject);
    public function renderedJSCache();
    public function retrieveRenderedJSCache();
}

?>