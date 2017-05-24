<?php

namespace Circle314\Authentication\LDAP;

/**
 * Class AbstractLDAPAuthenticationConfiguration
 * @package Circle314\AuthenticationHandler\LDAP
 */
abstract class AbstractLDAPAuthenticationConfiguration implements LDAPAuthenticationConfigurationInterface
{
    /* @var string|null */
    private $baseDN = null;

    /* @var bool */
    private $isEnabled = true;

    /* @var integer|null */
    private $port = null;

    /* @var string|null */
    private $server = null;

    /**
     * AbstractLDAPAuthenticationConfiguration constructor.
     * @param $server               string
     * @param $port                 integer
     * @param $baseDN               string
     * @param $isEnabled            bool
     */
    final public function __construct($server, $port, $baseDN, $isEnabled = true) {
        $this
            ->_setBaseDN($baseDN)
            ->_setServer($server)
            ->_setPort($port)
            ->_setIsEnabled($isEnabled);
    }

    /**
     * @return string
     */
    public function getBaseDN() {
        return $this->baseDN;
    }

    /**
     * @return boolean
     */
    public function enforceAuthentication() {
        return (bool)$this->isEnabled;
    }

    /**
     * @return int
     */
    public function getPort() {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getServer() {
        return $this->server;
    }
    #endregion

    #region Private methods
    /**
     * @param $baseDN
     * @return $this
     */
    private function _setBaseDN($baseDN)
    {
        $this->baseDN = $baseDN;
        return $this;
    }

    /**
     * @param $isEnabled
     * @return $this
     */
    private function _setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    /**
     * @param $port
     * @return $this
     */
    private function _setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @param $server
     * @return $this
     */
    private function _setServer($server)
    {
        $this->server = $server;
        return $this;
    }
    #endregion
}

?>