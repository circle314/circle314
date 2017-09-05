<?php

namespace Circle314\Component\Authentication\LDAP;

use Circle314\Component\Authentication\AuthenticationHandlerInterface;

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