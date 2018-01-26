<?php

namespace Circle314\Component\Renderer;

use Circle314\Component\Exception\FileNotFoundException;
use Circle314\Component\FileLocator\JSTemplateFileLocatorInterface;
use Circle314\Component\RenderableObject\JSRenderableObjectInterface;
use Circle314\Component\RenderableObject\RenderableObjectInterface;
use Circle314\Component\Type\StringType;

abstract class AbstractJSRenderer extends AbstractRenderer implements JSRendererInterface
{
    /** @var RenderedJSCacheInterface */
    private $renderedJSCache;

    /**
     * AbstractJSRenderer constructor.
     * @param JSTemplateFileLocatorInterface $JSTemplateFileLocator
     * @param RenderedJSCacheInterface $renderedJSCache
     * @throws \Circle314\Component\Exception\IncompleteConstructionException
     */
    final public function __construct(
        JSTemplateFileLocatorInterface  $JSTemplateFileLocator,
        RenderedJSCacheInterface        $renderedJSCache
    )
    {
        $this->renderedJSCache      = $renderedJSCache;
        $this->setRenderableObjectInterface(JSRenderableObjectInterface::class);
        parent::__construct($JSTemplateFileLocator);
    }

    /**
     * @param RenderableObjectInterface $JSRenderableObject
     * @return mixed|string
     * @throws FileNotFoundException
     * @throws \Circle314\Component\Exception\IncompatibleSubtypeException
     * @throws \Circle314\Component\Type\Exception\TypeValidationException
     * @throws \Circle314\Component\Type\Exception\ValueOutOfBoundsException
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

    /**
     * @param JSRenderableObjectInterface $JSRenderableObject
     * @throws \Circle314\Component\Exception\IncompatibleSubtypeException
     */
    public function cache(JSRenderableObjectInterface $JSRenderableObject)
    {
        $this->renderedJSCache()->cacheRenderedScript(
            $this->render(
                $JSRenderableObject
            )
        );
    }

    final public function renderedJSCache()
    {
        return $this->renderedJSCache;
    }

    final public function retrieveRenderedJSCache()
    {
        return $this->renderedJSCache()->retrieveCache();
    }
}
