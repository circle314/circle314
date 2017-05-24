<?php

namespace Circle314\ParameterSet\SuperGlobal;

interface ServerSuperGlobalInterface
{
    public function httpUserAgent();
    public function remoteAddr();
    public function requestURI();
}

?>