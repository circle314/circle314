<?php

namespace Circle314\ParameterSet\SuperGlobal;

use Circle314\ParameterSet\ParameterSetInterface;

interface SuperGlobalRepositoryInterface extends ParameterSetInterface
{
    /** @return CookieSuperGlobal */
    public function cookie();
    /** @return EnvSuperGlobal */
    public function env();
    /** @return FilesSuperGlobal */
    public function files();
    /** @return GetSuperGlobal */
    public function get();
    /** @return PostSuperGlobal */
    public function post();
    /** @return RequestSuperGlobal */
    public function request();
    /** @return ServerSuperGlobalInterface */
    public function server();
    /** @return SessionSuperGlobal */
    public function session();
    public function setSession();
}

?>