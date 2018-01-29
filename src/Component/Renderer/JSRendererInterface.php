<?php

namespace Circle314\Component\Renderer;

use Circle314\Component\RenderableObject\JSRenderableObjectInterface;

interface JSRendererInterface extends RendererInterface
{
    public function cache(JSRenderableObjectInterface $JSRenderableObject);
    public function renderedJSCache();
    public function retrieveRenderedJSCache();
}
