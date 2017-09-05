<?php

namespace Circle314\Component\FileLocator;

abstract class AbstractFileLocatorConfiguration implements FileLocatorConfigurationInterface {

    /** @var string */
    private $fileExtension;
    /** @var string */
    private $rootDirectory;

    /**
     * AbstractFileLocatorConfiguration constructor.
     * @param string $rootDirectory
     * @param string $fileExtension
     */
    public function __construct(
        $rootDirectory      = '',
        $fileExtension      = ''
    ) {
        $this->rootDirectory    = $rootDirectory;
        $this->fileExtension    = $fileExtension;
    }

    /**
     * @return string
     */
    final public function getFileExtension() {
        return $this->fileExtension;
    }

    /**
     * @return string
     */
    final public function getRootDirectory() {
        return $this->rootDirectory;
    }
}

?>