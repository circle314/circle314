<?php

namespace Circle314\Renderer;

use Circle314\Exception\FileNotFoundException;
use Circle314\FileLocator\HTMLTemplateFileLocatorInterface;
use Circle314\RenderableObject\HTMLRenderableObjectInterface;
use Circle314\RenderableObject\RenderableObjectInterface;
use Circle314\Type\StringType;

abstract class AbstractHTMLRenderer extends AbstractRenderer implements HTMLRendererInterface
{
    /**
     * AbstractHTMLRenderer constructor.
     * @param HTMLTemplateFileLocatorInterface $HTMLTemplateFileLocator
     */
    final public function __construct(HTMLTemplateFileLocatorInterface $HTMLTemplateFileLocator)
    {
        $this->setRenderableObjectInterface(HTMLRenderableObjectInterface::class);
        parent::__construct($HTMLTemplateFileLocator);
    }

    /**
     * @param RenderableObjectInterface $JSRenderableObject
     * @return string
     * @throws FileNotFoundException
     */
    protected function renderContent(RenderableObjectInterface $JSRenderableObject)
    {
        $this->checkRenderableObjectInterface($JSRenderableObject);
        if(!$this->renderableObjectTemplateLocator()->fileExists($JSRenderableObject))
        {
            throw new FileNotFoundException(
                'Could not find renderable file associated with ' . get_class($JSRenderableObject) .
                ' using locator of type ' . get_class($this->renderableObjectTemplateLocator())
            );
        }

        return $JSRenderableObject->renderFromFilePath(
            new StringType(
                $this->renderableObjectTemplateLocator()->getFilePath(
                    $JSRenderableObject
                )
            )
        );
    }
}

?>