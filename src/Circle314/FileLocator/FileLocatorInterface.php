<?php

namespace Circle314\FileLocator;

use Circle314\RenderableObject\RenderableObjectInterface;

interface FileLocatorInterface
{
    /**
     * @return FileLocatorConfigurationInterface
     */
    public function configuration();

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return bool
     */
    public function fileExists(RenderableObjectInterface $renderableObject);

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return string
     */
    public function getFileName(RenderableObjectInterface $renderableObject);

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return string
     */
    public function getFileLocation(RenderableObjectInterface $renderableObject);

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return string
     */
    public function getFilePath(RenderableObjectInterface $renderableObject);
}

?>