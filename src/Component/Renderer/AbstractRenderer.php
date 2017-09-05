<?php

namespace Circle314\Component\Renderer;

use Circle314\Component\Exception\IncompatibleSubtypeException;
use Circle314\Component\Exception\IncompleteConstructionException;
use Circle314\Component\FileLocator\RenderableObjectTemplateLocatorInterface;
use Circle314\Component\RenderableObject\Native\NestedRenderableObjectCollectionItemInterface;
use Circle314\Component\RenderableObject\RenderableObjectInterface;

abstract class AbstractRenderer implements RendererInterface
{
    /** @var RenderableObjectTemplateLocatorInterface */
    private $renderableObjectTemplateLocator;

    /** @var string */
    private $renderableObjectInterface;

    /**
     * AbstractRenderer constructor.
     * @param RenderableObjectTemplateLocatorInterface $renderableObjectTemplateLocator
     * @throws IncompleteConstructionException
     */
    public function __construct(RenderableObjectTemplateLocatorInterface $renderableObjectTemplateLocator)
    {
        if(is_null($this->renderableObjectInterface)) {
            throw new IncompleteConstructionException();
        }
        $this->renderableObjectTemplateLocator = $renderableObjectTemplateLocator;
    }

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

    #region Protected Methods
    /**
     * @return RenderableObjectTemplateLocatorInterface
     */
    final protected function renderableObjectTemplateLocator()
    {
        return $this->renderableObjectTemplateLocator;
    }

    /**
     * @param $renderableObjectInterface string
     */
    final protected function setRenderableObjectInterface($renderableObjectInterface)
    {
        $this->renderableObjectInterface = $renderableObjectInterface;
    }

    /**
     * @param RenderableObjectInterface $renderableObject
     * @throws IncompatibleSubtypeException
     */
    final protected function checkRenderableObjectInterface(RenderableObjectInterface $renderableObject)
    {
        if(!is_a($renderableObject, $this->renderableObjectInterface)){
            throw new IncompatibleSubtypeException(
                'Incompatible subtype.  Expected class of type ' . $this->renderableObjectInterface
            );
        }
    }
    #endregion

    #region Abstract Methods
    /**
     * @return mixed
     */
    abstract protected function preRender();

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return mixed
     */
    abstract protected function renderContent(RenderableObjectInterface $renderableObject);

    /**
     * @return mixed
     */
    abstract protected function postRender();
    #endregion
}

?>