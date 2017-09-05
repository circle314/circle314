<?php

namespace Circle314\Component\IO\Page\Native;

use Circle314\Component\Exception\NonRenderableObjectException;
use Circle314\Component\IO\Page\AbstractPageResponseHandler;
use Circle314\Component\IO\Response\ResponseInterface;
use Circle314\Component\RenderableObject\HTMLJSRenderableObjectInterface;
use Circle314\Component\RenderableObject\HTMLRenderableObjectInterface;
use Circle314\Component\RenderableObject\JSRenderableObjectInterface;
use Circle314\Component\RenderableObject\Native\NestedRenderableObjectCollectionInterface;
use Circle314\Component\RenderableObject\Native\NestedRenderableObjectCollectionItemInterface;
use Circle314\Component\RenderableObject\RenderableObjectInterface;
use Circle314\Component\Renderer\HTMLJSRendererInterface;
use Circle314\Component\Renderer\HTMLRendererInterface;
use Circle314\Component\Renderer\JSRendererInterface;

class NativePageResponseHandler extends AbstractPageResponseHandler
{
    #region Properties
    /** @var HTMLRendererInterface */
    protected $HTMLRenderer;

    /** @var HTMLJSRendererInterface */
    protected $HTMLJSRenderer;

    /** @var JSRendererInterface */
    protected $JSRenderer;
    #endregion

    #region Constructor
    public function __construct(
        HTMLRendererInterface           $HTMLRenderer,
        JSRendererInterface             $JSRenderer,
        HTMLJSRendererInterface         $HTMLJSRenderer
    ) {
        $this->HTMLRenderer             = $HTMLRenderer;
        $this->JSRenderer               = $JSRenderer;
        $this->HTMLJSRenderer           = $HTMLJSRenderer;
        parent::__construct();
    }
    #endregion

    #region Public Methods
    public function generateResponse(ResponseInterface $pageResponse)
    {
        /** @var RenderableObjectInterface $renderableResponse */
        $renderableResponse = $pageResponse->processResponse();
        $renderedResponse = null;
        return $this->renderRenderableObject($renderableResponse);
    }

    #endregion

    #region Protected Methods
    protected function preProcessResponseCode(ResponseInterface $response) {}
    protected function postProcessResponseCode(ResponseInterface $response) {}

    final protected function renderRenderableObject(RenderableObjectInterface $renderableObject)
    {
        $this->processNestedRenderableObjectCollection($renderableObject->nestedRenderableObjectCollection());
        if($renderableObject instanceof HTMLJSRenderableObjectInterface) {
            /** @var $pageResponse HTMLJSRenderableObjectInterface */
            $renderedContent = $this->HTMLJSRenderer()->render($renderableObject);
        } elseif($renderableObject instanceof HTMLRenderableObjectInterface) {
            /** @var $pageResponse HTMLRenderableObjectInterface */
            $renderedContent = $this->HTMLRenderer()->render($renderableObject);
        } elseif($renderableObject instanceof JSRenderableObjectInterface) {
            $renderedContent = $this->JSRenderer()->render($renderableObject);
        } else {
            throw new NonRenderableObjectException('No renderer supplied for renderable object of type ' . get_class($renderableObject));
        }
        return $renderedContent;
    }

    /**
     * @return HTMLRendererInterface
     */
    protected function HTMLRenderer()
    {
        return $this->HTMLRenderer;
    }

    /**
     * @return HTMLJSRendererInterface
     */
    protected function HTMLJSRenderer()
    {
        return $this->HTMLJSRenderer;
    }

    /**
     * @return JSRendererInterface
     */
    protected function JSRenderer()
    {
        return $this->JSRenderer;
    }
    #endregion

    #region Private Methods
    final private function processNestedRenderableObjectCollection(NestedRenderableObjectCollectionInterface $nestedRenderableObjectCollection)
    {
        /** @var NestedRenderableObjectCollectionItemInterface $nestedRenderableObject */
        foreach($nestedRenderableObjectCollection as $nestedRenderableObject)
        {
            $this->processNestedRenderableObjectCollection(
                $nestedRenderableObject->getRenderableObject()->nestedRenderableObjectCollection()
            );
            $nestedRenderableObject->setRenderedContent(
                $this->renderRenderableObject(
                    $nestedRenderableObject->getRenderableObject()
                )
            );
        }
    }
    #endregion
}

?>