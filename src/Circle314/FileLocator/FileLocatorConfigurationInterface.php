<?php

namespace Circle314\FileLocator;

/**
 * Interface FileLocatorConfigurationInterface
 * @package Circle314\FileLocator
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