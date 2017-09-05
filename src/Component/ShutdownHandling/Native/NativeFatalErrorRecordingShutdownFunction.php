<?php

namespace Circle314\Component\ShutdownHandling\Native;

use Circle314\Component\ShutdownHandling\AbstractShutdownHandlingFunction;

class NativeFatalErrorRecordingShutdownFunction extends AbstractShutdownHandlingFunction
{
    final public function handleShutdown()
    {
        // Handle any fatal errors
        if(is_null($err = error_get_last()) === FALSE)
        {
            $error = 'FATAL ERROR HAS OCCURRED' . PHP_EOL;
            $error .= 'Type: ' . $err['type'] . PHP_EOL;
            $error .= 'Message: ' . $err['message'] . PHP_EOL;
            $error .= 'File: ' . $err['file'] . PHP_EOL;
            $error .= 'Line: ' . $err['line'] . PHP_EOL;

            ob_start();
            debug_print_backtrace();
            $output_buffer = PHP_EOL . ob_get_contents();
            ob_end_clean();

            error_log($output_buffer);
            error_log($error);
            error_log('$_SERVER array: ' . var_export($_SERVER, true));
            error_log('$_GET array: ' . var_export($_GET, true));
            error_log('$_POST array: ' . var_export($_POST, true));
            error_log('$_REQUEST array: ' . var_export($_REQUEST, true));

            die();
        }
    }
}