<?php

namespace Circle314\Component\ExceptionHandling;

interface ExceptionHandlerInterface extends ExceptionHandlingInterface
{
    public function registerExceptionHandlingFunction(ExceptionHandlingFunctionInterface $exceptionHandlingFunction);
}
