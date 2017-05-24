<?php

namespace Circle314\FileLocator;

use Circle314\RenderableObject\JSRenderableObjectInterface;

/**
 * Class AbstractHTMLTemplateFileLocator
 * @package Circle314\FileLocator
 */
abstract class AbstractJSTemplateFileLocator extends AbstractRenderableObjectTemplateLocator implements JSTemplateFileLocatorInterface
{
    final public function __construct(FileLocatorConfigurationInterface $fileLocatorConfiguration)
    {
        $this->setRenderableObjectInterface(JSRenderableObjectInterface::class);
        parent::__construct($fileLocatorConfiguration);
    }
}

?>