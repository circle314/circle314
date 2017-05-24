<?php

namespace Circle314\Authentication\LDAP;

use Circle314\Authentication\AuthenticationConfigurationInterface;

/**
 * Interface LDAPAuthenticationConfigurationInterface
 * @package Circle314\Authentication
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