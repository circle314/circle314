<?php

namespace Circle314\FileLocator;

use Circle314\RenderableObject\HTMLRenderableObjectInterface;

/**
 * Class AbstractHTMLTemplateFileLocator
 * @package Circle314\FileLocator
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