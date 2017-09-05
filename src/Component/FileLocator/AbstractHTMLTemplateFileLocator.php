<?php

namespace Circle314\Component\FileLocator;

use Circle314\Component\RenderableObject\HTMLRenderableObjectInterface;

/**
 * Class AbstractHTMLTemplateFileLocator
 * @package Circle314\Component\FileLocator
 */
abstract class AbstractHTMLTemplateFileLocator extends AbstractRenderableObjectTemplateLocator implements HTMLTemplateFileLocatorInterface
{
    final public function __construct(FileLocatorConfigurationInterface $fileLocatorConfiguration)
    {
        $this->setRenderableObjectInterface(HTMLRenderableObjectInterface::class);
        parent::__construct($fileLocatorConfiguration);
    }
}

?>