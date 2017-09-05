<?php

namespace Circle314\Component\ShutdownHandling;

abstract class AbstractShutdownHandlingFunction implements ShutdownHandlingFunctionInterface
{
    #region Public Methods
    final public function ID()
    {
        return static::class;
    }
    #endregion

    #region Abstract Methods
    /**
     * @return mixed
     */
    abstract public function handleShutdown();
    #endregion
}
