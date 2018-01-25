<?php

namespace Circle314\Component\ParameterSet\SuperGlobal;

/**
 * Interface ServerSuperGlobalInterface
 * @package Circle314\Component\ParameterSet
 * @deprecated 0.7
 */
interface ServerSuperGlobalInterface
{
    public function httpUserAgent();
    public function remoteAddr();
    public function requestURI();
}
