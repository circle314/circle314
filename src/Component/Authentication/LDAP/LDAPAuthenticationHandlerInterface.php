<?php

namespace Circle314\Component\Authentication\LDAP;

use Circle314\Component\Authentication\AuthenticationHandlerInterface;

/**
 * Interface LDAPAuthenticationHandlerInterface
 * @package Circle314\Component\Authentication\LDAP
 * @deprecated 0.7
 */
interface LDAPAuthenticationHandlerInterface extends AuthenticationHandlerInterface
{
    /**
     * LDAPAuthenticationHandlerInterface constructor.
     * @param LDAPAuthenticationConfigurationInterface $configuration
     */
    public function __construct(LDAPAuthenticationConfigurationInterface $configuration);

    public function authenticate($username, $password);
}

?>