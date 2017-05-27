<?php

namespace Circle314\ExceptionHandling;

use \Throwable;

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
     * @param Throwable $e
     * @return mixed
     */
    abstract public function handleException(Throwable $e);
    #endregion
}
