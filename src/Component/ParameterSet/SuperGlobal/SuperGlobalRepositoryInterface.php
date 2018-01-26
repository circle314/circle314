<?php

namespace Circle314\Component\ParameterSet\SuperGlobal;

use Circle314\Component\ParameterSet\ParameterSetInterface;

/**
 * Interface SuperGlobalRepositoryInterface
 * @package Circle314\Component\ParameterSet
 * @deprecated 0.7
 */
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
