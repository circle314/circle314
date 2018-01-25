<?php

namespace Circle314\Component\ParameterSet\SuperGlobal;

/**
 * Class ServerSuperGlobal
 * @package Circle314\Component\ParameterSet
 * @deprecated 0.7
 */
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
