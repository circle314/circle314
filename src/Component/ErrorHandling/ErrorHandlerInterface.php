<?php

namespace Circle314\Component\ErrorHandling;

interface ErrorHandlerInterface extends ErrorHandlingInterface
{
    public function registerErrorHandlingFunction(ErrorHandlingFunctionInterface $errorHandlingFunction);
}

?>