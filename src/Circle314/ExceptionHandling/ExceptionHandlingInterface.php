<?php

namespace Circle314\ExceptionHandling;

use \Throwable;

interface ExceptionHandlingInterface
{
    /**
     * @param Throwable $e
     * @return mixed
     */
    public function handleException(Throwable $e);
}
