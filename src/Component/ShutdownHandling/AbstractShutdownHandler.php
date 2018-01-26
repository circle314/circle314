<?php

namespace Circle314\Component\ShutdownHandling;

abstract class AbstractShutdownHandler implements ShutdownHandlerInterface
{
    #region Properties
    /** @var ShutdownHandlingFunctionCollection */
    private $shutdownHandlingFunctionCollection;
    #endregion

    #region Constructor
    public function __construct()
    {
        $this->shutdownHandlingFunctionCollection   = new ShutdownHandlingFunctionCollection();
    }
    #endregion

    #region Public Methods
    /**
     * @return void
     */
    public function handleShutdown()
    {
        foreach($this->shutdownHandlingFunctionCollection() as $shutdownHandlingFunction)
        {
            $shutdownHandlingFunction->handleShutdown();
        }
    }

    /**
     * @param ShutdownHandlingFunctionInterface $shutdownHandlingFunction
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     */
    public function registerShutdownHandlingFunction(ShutdownHandlingFunctionInterface $shutdownHandlingFunction)
    {
        $this->shutdownHandlingFunctionCollection()->addCollectionItem($shutdownHandlingFunction);
    }
    #endregion

    #region Protected Methods
    /**
     * @return ShutdownHandlingFunctionCollection
     */
    protected function shutdownHandlingFunctionCollection()
    {
        return $this->shutdownHandlingFunctionCollection;
    }
    #endregion
}
