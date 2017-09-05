<?php

namespace Circle314\Component\ErrorHandling;

abstract class AbstractErrorHandlingFunction implements ErrorHandlingFunctionInterface
{
    abstract public function handleError($err_severity, $err_msg, $err_file, $err_line, array $err_context);
}

?>