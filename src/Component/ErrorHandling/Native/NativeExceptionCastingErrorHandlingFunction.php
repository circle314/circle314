<?php

namespace Circle314\Component\ErrorHandling\Native;

use \Exception;
use \ErrorException;
use Circle314\Component\ErrorHandling\AbstractErrorHandlingFunction;
use Circle314\Component\Exception\PHPError\WarningException;
use Circle314\Component\Exception\PHPError\ParseException;
use Circle314\Component\Exception\PHPError\NoticeException;
use Circle314\Component\Exception\PHPError\CoreErrorException;
use Circle314\Component\Exception\PHPError\CoreWarningException;
use Circle314\Component\Exception\PHPError\CompileErrorException;
use Circle314\Component\Exception\PHPError\CompileWarningException;
use Circle314\Component\Exception\PHPError\UserErrorException;
use Circle314\Component\Exception\PHPError\UserWarningException;
use Circle314\Component\Exception\PHPError\UserNoticeException;
use Circle314\Component\Exception\PHPError\StrictException;
use Circle314\Component\Exception\PHPError\RecoverableErrorException;
use Circle314\Component\Exception\PHPError\DeprecatedException;
use Circle314\Component\Exception\PHPError\UserDeprecatedException;

class NativeExceptionCastingErrorHandlingFunction extends AbstractErrorHandlingFunction
{
    /**
     * @param $err_severity
     * @param $err_msg
     * @param $err_file
     * @param $err_line
     * @param array $err_context
     * @throws CompileErrorException
     * @throws CompileWarningException
     * @throws CoreErrorException
     * @throws CoreWarningException
     * @throws DeprecatedException
     * @throws ErrorException
     * @throws Exception
     * @throws NoticeException
     * @throws ParseException
     * @throws RecoverableErrorException
     * @throws StrictException
     * @throws UserDeprecatedException
     * @throws UserErrorException
     * @throws UserNoticeException
     * @throws UserWarningException
     * @throws WarningException
     */
    final public function handleError($err_severity, $err_msg, $err_file, $err_line, Array $err_context)
    {
        $err_msg =
            $this->errorSeverityToString($err_severity) .
            ': ' . $err_msg;

        switch($err_severity)
        {
            case E_ERROR:               throw new ErrorException            ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_WARNING:             throw new WarningException          ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_PARSE:               throw new ParseException            ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_NOTICE:              throw new NoticeException           ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_CORE_ERROR:          throw new CoreErrorException        ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_CORE_WARNING:        throw new CoreWarningException      ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_COMPILE_ERROR:       throw new CompileErrorException     ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_COMPILE_WARNING:     throw new CompileWarningException   ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_USER_ERROR:          throw new UserErrorException        ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_USER_WARNING:        throw new UserWarningException      ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_USER_NOTICE:         throw new UserNoticeException       ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_STRICT:              throw new StrictException           ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_RECOVERABLE_ERROR:   throw new RecoverableErrorException ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_DEPRECATED:          throw new DeprecatedException       ($err_msg, 0, $err_severity, $err_file, $err_line);
            case E_USER_DEPRECATED:     throw new UserDeprecatedException   ($err_msg, 0, $err_severity, $err_file, $err_line);
            default:                    throw new Exception                 ($err_msg, 0, $err_severity);
        }
    }

    final protected function errorSeverityToString($err_severity)
    {
        switch($err_severity)
        {
            case E_ERROR:               return 'PHP Error Type E_ERROR';
            case E_WARNING:             return 'PHP Error Type E_WARNING';
            case E_PARSE:               return 'PHP Error Type E_PARSE';
            case E_NOTICE:              return 'PHP Error Type E_NOTICE';
            case E_CORE_ERROR:          return 'PHP Error Type E_CORE_ERROR';
            case E_CORE_WARNING:        return 'PHP Error Type E_CORE_WARNING';
            case E_COMPILE_ERROR:       return 'PHP Error Type E_COMPILE_ERROR';
            case E_COMPILE_WARNING:     return 'PHP Error Type E_COMPILE_WARNING';
            case E_USER_ERROR:          return 'PHP Error Type E_USER_ERROR';
            case E_USER_WARNING:        return 'PHP Error Type E_USER_WARNING';
            case E_USER_NOTICE:         return 'PHP Error Type E_USER_NOTICE';
            case E_STRICT:              return 'PHP Error Type E_STRICT';
            case E_RECOVERABLE_ERROR:   return 'PHP Error Type E_RECOVERABLE_ERROR';
            case E_DEPRECATED:          return 'PHP Error Type E_DEPRECATED';
            case E_USER_DEPRECATED:     return 'PHP Error Type E_USER_DEPRECATED';
            default:                    return 'PHP Error Type Unknown';
        }
    }
}
