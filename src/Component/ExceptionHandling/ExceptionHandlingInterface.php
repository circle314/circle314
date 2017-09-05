<?php

namespace Circle314\Component\ExceptionHandling;

use \Throwable;

interface ExceptionHandlingInterface
{
    /**
     * @param Throwable $e
     * @return mixed
     */
    public function handleException(Throwable $e);
}
