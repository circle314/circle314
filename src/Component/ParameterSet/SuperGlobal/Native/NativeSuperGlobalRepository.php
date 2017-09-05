<?php

namespace Circle314\Component\ParameterSet\SuperGlobal\Native;

use Circle314\Component\ParameterSet\SuperGlobal\CookieSuperGlobal;
use Circle314\Component\ParameterSet\SuperGlobal\EnvSuperGlobal;
use Circle314\Component\ParameterSet\SuperGlobal\FilesSuperGlobal;
use Circle314\Component\ParameterSet\SuperGlobal\GetSuperGlobal;
use Circle314\Component\ParameterSet\SuperGlobal\PostSuperGlobal;
use Circle314\Component\ParameterSet\SuperGlobal\RequestSuperGlobal;
use Circle314\Component\ParameterSet\SuperGlobal\ServerSuperGlobal;
use Circle314\Component\ParameterSet\SuperGlobal\SessionSuperGlobal;
use Circle314\Component\ParameterSet\SuperGlobal\SuperGlobalRepositoryInterface;

class NativeSuperGlobalRepository implements SuperGlobalRepositoryInterface {
    /** @var CookieSuperGlobal */
    private $_COOKIE;
    /** @var EnvSuperGlobal */
    private $_ENV;
    /** @var FilesSuperGlobal */
    private $_FILES;
    /** @var GetSuperGlobal */
    private $_GET;
    /** @var PostSuperGlobal */
    private $_POST;
    /** @var RequestSuperGlobal */
    private $_REQUEST;
    /** @var ServerSuperGlobal */
    private $_SERVER;
    /** @var SessionSuperGlobal */
    private $_SESSION;
    
    final public function __construct(
        CookieSuperGlobal   $cookie,
        EnvSuperGlobal      $env,
        FilesSuperGlobal    $files,
        GetSuperGlobal      $get,
        PostSuperGlobal     $post,
        RequestSuperGlobal  $request,
        ServerSuperGlobal   $server
    ) {
        $this->_COOKIE  = $cookie;
        $this->_ENV     = $env;
        $this->_FILES   = $files;
        $this->_GET     = $get;
        $this->_POST    = $post;
        $this->_REQUEST = $request;
        $this->_SERVER  = $server;
    }

    final public function setSession() {
        $sessionVariable = (session_status() == PHP_SESSION_NONE)
            ? []
            : $_SESSION
        ;
        $this->_SESSION = new SessionSuperGlobal($sessionVariable);
    }

    /**
     * @return CookieSuperGlobal
     */
    final public function cookie() {
        return $this->_COOKIE;
    }

    /**
     * @return EnvSuperGlobal
     */
    final public function env() {
        return $this->_ENV;
    }

    /**
     * @return FilesSuperGlobal
     */
    final public function files() {
        return $this->_FILES;
    }

    /**
     * @return GetSuperGlobal
     */
    final public function get() {
        return $this->_GET;
    }

    /**
     * @return PostSuperGlobal
     */
    final public function post() {
        return $this->_POST;
    }

    /**
     * @return RequestSuperGlobal
     */
    final public function request() {
        return $this->_REQUEST;
    }

    /**
     * @return ServerSuperGlobal
     */
    final public function server() {
        return $this->_SERVER;
    }

    /**
     * @return SessionSuperGlobal
     */
    final public function session() {
        return $this->_SESSION;
    }
}

?>