<?php

namespace Circle314\Component\FileLocator;

use Circle314\Component\RenderableObject\JSRenderableObjectInterface;

/**
 * Class AbstractHTMLTemplateFileLocator
 * @package Circle314\Component\FileLocator
 */
abstract class AbstractJSTemplateFileLocator extends AbstractRenderableObjectTemplateLocator implements JSTemplateFileLocatorInterface
{
    /**
     * AbstractJSTemplateFileLocator constructor.
     * @param FileLocatorConfigurationInterface $fileLocatorConfiguration
     * @throws \Circle314\Component\Exception\IncompleteConstructionException
     */
    final public function __construct(FileLocatorConfigurationInterface $fileLocatorConfiguration)
    {
        $this->setRenderableObjectInterface(JSRenderableObjectInterface::class);
        parent::__construct($fileLocatorConfiguration);
    }
}
