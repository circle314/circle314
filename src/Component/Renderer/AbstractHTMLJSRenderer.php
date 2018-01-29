<?php

namespace Circle314\Component\Renderer;

use Circle314\Component\Exception\IncompatibleSubtypeException;
use Circle314\Component\RenderableObject\HTMLJSRenderableObjectInterface;
use Circle314\Component\RenderableObject\Native\NestedRenderableObjectCollectionItemInterface;
use Circle314\Component\RenderableObject\RenderableObjectInterface;

abstract class AbstractHTMLJSRenderer implements HTMLJSRendererInterface
{
    /** @var HTMLRendererInterface */
    private $HTMLRenderer;

    /** @var JSRendererInterface */
    private $JSRenderer;

    /** @var string */
    private $renderableObjectInterface;

    final public function __construct(
        HTMLRendererInterface       $HTMLRenderer,
        JSRendererInterface         $JSRenderer
    ) {
        $this->renderableObjectInterface = HTMLJSRenderableObjectInterface::class;
        $this->HTMLRenderer         = $HTMLRenderer;
        $this->JSRenderer           = $JSRenderer;
    }

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return string
     * @throws IncompatibleSubtypeException
     */
    final public function render(RenderableObjectInterface $renderableObject)
    {
        if(is_subclass_of($renderableObject, $this->renderableObjectInterface)){
            $this->preRender();
            /** @var NestedRenderableObjectCollectionItemInterface $nestedRenderableObjectCollectionItem */
            foreach($renderableObject->nestedRenderableObjectCollection() as $nestedRenderableObjectCollectionItem) {
                $nestedRenderableObjectCollectionItem->setRenderedContent(
                    $this->renderContent($nestedRenderableObjectCollectionItem->getRenderableObject())
                );
            }
            $returnValue = $this->renderContent($renderableObject);
            $this->postRender();
        } else {
            throw new IncompatibleSubtypeException(
                'Incompatible subtype.  Expected class of type ' . $this->renderableObjectInterface
            );
        }
        return $returnValue;
    }



    protected function renderContent(RenderableObjectInterface $HTMLJSRenderableObject)
    {
        return
            $this->HTMLRenderer()->render($HTMLJSRenderableObject)
            . $this->JSRenderer()->render($HTMLJSRenderableObject);

    }

    final public function retrieveRenderedJSCache()
    {
        return $this->JSRenderer()->retrieveRenderedJSCache();
    }

    /**
     * @return HTMLRendererInterface
     */
    final protected function HTMLRenderer()
    {
        return $this->HTMLRenderer;
    }

    /**
     * @return JSRendererInterface
     */
    final protected function JSRenderer()
    {
        return $this->JSRenderer;
    }

    #region Abstract Methods
    /**
     * @return mixed
     */
    abstract protected function preRender();

    /**
     * @return mixed
     */
    abstract protected function postRender();
    #endregion

}
