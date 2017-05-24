<?php

namespace Circle314\Authentication\LDAP;

use Circle314\Authentication\AuthenticationHandlerInterface;

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