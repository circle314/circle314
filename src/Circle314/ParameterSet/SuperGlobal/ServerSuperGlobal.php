<?php

namespace Circle314\ParameterSet\SuperGlobal;

final class ServerSuperGlobal extends AbstractSuperGlobal implements ServerSuperGlobalInterface
{
    public function httpUserAgent()
    {
        return $this->getID('HTTP_USER_AGENT');
    }

    public function remoteAddr()
    {
        return $this->getID('REMOTE_ADDR');
    }

    public function requestURI()
    {
        return $this->getID('REQUEST_URI');
    }
}

?>