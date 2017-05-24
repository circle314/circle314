<?php

namespace Circle314\ExceptionHandling;

use \Exception;

abstract class AbstractExceptionHandlingFunction implements ExceptionHandlingFunctionInterface
{
    #region Public Methods
    final public function ID()
    {
        return static::class;
    }
    #endregion

    #region Abstract Methods
    /**
     * @param Exception $e
     * @return mixed
     */
    abstract public function handleException(Exception $e);
    #endregion
}

?>