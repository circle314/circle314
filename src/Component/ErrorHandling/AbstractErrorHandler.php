<?php

namespace Circle314\Component\ErrorHandling;

abstract class AbstractErrorHandler implements ErrorHandlerInterface
{
    #region Properties
    /** @var ErrorHandlingFunctionCollection */
    private $errorHandlingFunctionCollection;
    #endregion

    #region Constructor
    public function __construct()
    {
        $this->errorHandlingFunctionCollection   = new ErrorHandlingFunctionCollection();
    }
    #endregion

    #region Public Methods
    /**
     * @param $err_severity
     * @param $err_msg
     * @param $err_file
     * @param $err_line
     * @param array $err_context
     */
    public function handleError($err_severity, $err_msg, $err_file, $err_line, array $err_context)
    {
        foreach($this->errorHandlingFunctionCollection() as $errorHandlingFunction)
        {
            $errorHandlingFunction->handleError($err_severity, $err_msg, $err_file, $err_line, $err_context);
        }
    }

    /**
     * @param ErrorHandlingFunctionInterface $errorHandlingFunction
     */
    public function registerErrorHandlingFunction(ErrorHandlingFunctionInterface $errorHandlingFunction)
    {
        $this->errorHandlingFunctionCollection()->addCollectionItem($errorHandlingFunction);
    }
    #endregion

    #region Protected Methods
    /**
     * @return ErrorHandlingFunctionCollection
     */
    protected function errorHandlingFunctionCollection()
    {
        return $this->errorHandlingFunctionCollection;
    }
    #endregion
}

?>