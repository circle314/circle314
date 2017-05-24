<?php

namespace Circle314\ExceptionHandling;

use \Exception;

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
     * @param Exception $e
     * @return void
     */
    public function handleException(Exception $e)
    {
        foreach($this->exceptionHandlingFunctionCollection() as $exceptionHandlingFunction)
        {
            $exceptionHandlingFunction->handleException($e);
        }
    }

    /**
     * @param ExceptionHandlingFunctionInterface $exceptionHandlingFunction
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

?>