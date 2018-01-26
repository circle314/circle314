<?php

namespace Circle314\Component\ParameterSet\SuperGlobal;

/**
 * Class ServerSuperGlobal
 * @package Circle314\Component\ParameterSet
 * @deprecated 0.7
 */
final class ServerSuperGlobal extends AbstractSuperGlobal implements ServerSuperGlobalInterface
{
    /**
     * @return mixed
     * @throws \Circle314\Component\Collection\Exception\CollectionIDNotFoundException
     * @deprecated 0.7
     */
    public function httpUserAgent()
    {
        return $this->getID('HTTP_USER_AGENT');
    }

    /**
     * @return mixed
     * @throws \Circle314\Component\Collection\Exception\CollectionIDNotFoundException
     * @deprecated 0.7
     */
    public function remoteAddr()
    {
        return $this->getID('REMOTE_ADDR');
    }

    /**
     * @return mixed
     * @throws \Circle314\Component\Collection\Exception\CollectionIDNotFoundException
     * @deprecated 0.7
     */
    public function requestURI()
    {
        return $this->getID('REQUEST_URI');
    }
}
