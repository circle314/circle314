<?php

namespace Circle314\Component\FileLocator;

use \ReflectionClass;
use Circle314\Component\Exception\IncompatibleSubtypeException;
use Circle314\Component\Exception\IncompleteConstructionException;
use Circle314\Component\RenderableObject\RenderableObjectInterface;

abstract class AbstractRenderableObjectTemplateLocator implements RenderableObjectTemplateLocatorInterface
{
    #region Properties
    /** @var FileLocatorConfigurationInterface */
    private $configuration;

    /** @var string */
    private $renderableObjectInterface;
    #endregion

    #region Constructor
    /**
     * AbstractFileLocator constructor.
     * @param FileLocatorConfigurationInterface $configuration
     * @throws IncompleteConstructionException
     */
    public function __construct(FileLocatorConfigurationInterface $configuration)
    {
        if(is_null($this->renderableObjectInterface)) {
            throw new IncompleteConstructionException();
        }
        $this->configuration     = $configuration;
    }
    #endregion

    #region Public Methods
    /**
     * @return FileLocatorConfigurationInterface
     */
    final public function configuration()
    {
        return $this->configuration;
    }

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return string
     * @throws IncompatibleSubtypeException
     * @throws \ReflectionException
     */
    final public function getFileName(RenderableObjectInterface $renderableObject)
    {
        $this->checkRenderableObjectInterface($renderableObject);
        return
            (new ReflectionClass($renderableObject))->getShortName()
            . $this->configuration()->getFileExtension();
    }

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return string
     * @throws IncompatibleSubtypeException
     * @throws \ReflectionException
     */
    final public function getFileLocation(RenderableObjectInterface $renderableObject)
    {
        $this->checkRenderableObjectInterface($renderableObject);
        return
            $this->configuration()->getRootDirectory()
            . (new ReflectionClass($renderableObject))->getNamespaceName();
    }

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return string
     * @throws IncompatibleSubtypeException
     * @throws \ReflectionException
     */
    final public function getFilePath(RenderableObjectInterface $renderableObject) {
        $this->checkRenderableObjectInterface($renderableObject);
        return
            $this->configuration()->getRootDirectory()
            . (new ReflectionClass($renderableObject))->getName()
            . $this->configuration()->getFileExtension();
    }

    /**
     * @param RenderableObjectInterface $renderableObject
     * @return bool
     * @throws IncompatibleSubtypeException
     * @throws \ReflectionException
     */
    final public function fileExists(RenderableObjectInterface $renderableObject) {
        $this->checkRenderableObjectInterface($renderableObject);
        return file_exists($this->getFilePath($renderableObject));
    }
    #endregion

    #region Protected Methods
    /**
     * @param $renderableObjectInterface string
     */
    final protected function setRenderableObjectInterface($renderableObjectInterface)
    {
        $this->renderableObjectInterface = $renderableObjectInterface;
    }
    #endregion

    #region Private Methods
    /**
     * @param RenderableObjectInterface $renderableObject
     * @throws IncompatibleSubtypeException
     */
    final private function checkRenderableObjectInterface(RenderableObjectInterface $renderableObject)
    {
        if(!is_a($renderableObject, $this->renderableObjectInterface)){
            throw new IncompatibleSubtypeException(
                'Incompatible subtype.  Expected class of type ' . $this->renderableObjectInterface
            );
        }
    }
    #endregion
}
