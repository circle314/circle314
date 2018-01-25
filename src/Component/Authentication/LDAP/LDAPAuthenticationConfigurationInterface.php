<?php

namespace Circle314\Component\Authentication\LDAP;

use Circle314\Component\Authentication\AuthenticationConfigurationInterface;

/**
 * Interface LDAPAuthenticationConfigurationInterface
 * @package Circle314\Component\Authentication
 * @deprecated 0.7
 */
interface LDAPAuthenticationConfigurationInterface extends AuthenticationConfigurationInterface
{
    /**
     * @return string
     */
    public function getBaseDN();

    /**
     * @return boolean
     */
    public function enforceAuthentication();

    /**
     * @return int
     */
    public function getPort();

    /**
     * @return string
     */
    public function getServer();
}

?>