<?php

namespace Circle314\Component\ErrorHandling;

interface ErrorHandlingInterface
{
    /**
     * @param $err_severity
     * @param $err_msg
     * @param $err_file
     * @param $err_line
     * @param array $err_context
     */
    public function handleError($err_severity, $err_msg, $err_file, $err_line, array $err_context);
}

?>