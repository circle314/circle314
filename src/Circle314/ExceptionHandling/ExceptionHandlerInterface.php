<?php

namespace Circle314\ExceptionHandling;

interface ExceptionHandlerInterface extends ExceptionHandlingInterface
{
    public function registerExceptionHandlingFunction(ExceptionHandlingFunctionInterface $exceptionHandlingFunction);
}
