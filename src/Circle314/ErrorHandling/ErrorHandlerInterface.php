<?php

namespace Circle314\ErrorHandling;

interface ErrorHandlerInterface extends ErrorHandlingInterface
{
    public function registerErrorHandlingFunction(ErrorHandlingFunctionInterface $errorHandlingFunction);
}

?>