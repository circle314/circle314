<?php

namespace Circle314\Component\ParameterSet\SuperGlobal;

interface ServerSuperGlobalInterface
{
    public function httpUserAgent();
    public function remoteAddr();
    public function requestURI();
}

?>