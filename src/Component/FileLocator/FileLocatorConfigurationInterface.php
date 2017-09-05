<?php

namespace Circle314\Component\FileLocator;

/**
 * Interface FileLocatorConfigurationInterface
 * @package Circle314\Component\FileLocator
 */
interface FileLocatorConfigurationInterface
{
    /**
     * @return string
     */
    public function getFileExtension();

    /**
     * @return string
     */
    public function getRootDirectory();
}

?>