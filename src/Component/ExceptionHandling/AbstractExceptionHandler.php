<?php

namespace Circle314\Component\ExceptionHandling;

use \Throwable;

abstract class AbstractExceptionHandler implements ExceptionHandlerInterface
{
    #region Properties
    /** @var ExceptionHandlingFunctionCollection */
    private $exceptionHandlingFunctionCollection;
    #endregion

    #region Constructor
    public function __construct()
    {
        $this->exceptionHandlingFunctionCollection   = new ExceptionHandlingFunctionCollection();
    }
    #endregion

    #region Public Methods
    /**
     * @param Throwable $e
     * @return void
     */
    public function handleException(Throwable $e)
    {
        foreach($this->exceptionHandlingFunctionCollection() as $exceptionHandlingFunction)
        {
            $exceptionHandlingFunction->handleException($e);
        }
    }

    /**
     * @param ExceptionHandlingFunctionInterface $exceptionHandlingFunction
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     */
    public function registerExceptionHandlingFunction(ExceptionHandlingFunctionInterface $exceptionHandlingFunction)
    {
        $this->exceptionHandlingFunctionCollection()->addCollectionItem($exceptionHandlingFunction);
    }
    #endregion

    #region Protected Methods
    /**
     * @return ExceptionHandlingFunctionCollection
     */
    protected function exceptionHandlingFunctionCollection()
    {
        return $this->exceptionHandlingFunctionCollection;
    }
    #endregion
}
