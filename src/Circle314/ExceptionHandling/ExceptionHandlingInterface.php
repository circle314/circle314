<?php

namespace Circle314\ExceptionHandling;

use \Exception;

interface ExceptionHandlingInterface
{
    /**
     * @param Exception $e
     * @return mixed
     */
    public function handleException(Exception $e);
}

?>