<?php

namespace Circle314\Component\Authentication\LDAP;

use \Exception;
use Circle314\Component\Authentication\AbstractAuthenticationHandler;
use Circle314\Component\Authentication\LDAP\Exception\LDAPFailedToBindException;

/**
 * Class AbstractLDAPAuthenticationHandler
 * @package Circle314\Component\Authentication
 * @deprecated 0.7
 */
abstract class AbstractLDAPAuthenticationHandler extends AbstractAuthenticationHandler implements LDAPAuthenticationHandlerInterface
{
    /** @var LDAPAuthenticationConfigurationInterface */
    private $configuration;

    /** @var resource */
    private $LDAPResource;

    /**
     * AbstractLDAPAuthenticationHandler constructor.
     * @param LDAPAuthenticationConfigurationInterface $configuration
     */
    final public function __construct(LDAPAuthenticationConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;
        parent::__construct($configuration);
    }

    /**
     * @return LDAPAuthenticationConfigurationInterface
     */
    final public function configuration()
    {
        return $this->configuration;
    }

    /**
     * @param $username
     * @param $password
     * @throws LDAPFailedToBindException
     * @return bool|resource
     */
    public function authenticate($username, $password)
    {
        if($this->configuration()->enforceAuthentication()) {
            $this->LDAPResource = ldap_connect($this->configuration()->getServer(), $this->configuration()->getPort());
            try {
                return $this->bind($username, $password);
            } catch (Exception $e) {
                throw new LDAPFailedToBindException($e);
            }
        } else {
            // If authentication is not enforced, then we flag login as successful,
            // regardless of the username or password.
            // This allows us to test without an individual user's credentials,
            // which can be useful for impersonating users in test environments.
            return true;
        }
    }

    /**
     * @param $username string
     * @param $password string
     * @return resource
     */
    protected function bind($username, $password)
    {
        ldap_bind(
            $this->LDAPResource,
            "uid=" . $username . "," . $this->configuration()->getBaseDN(),
            $password
        );
        return $this->LDAPResource;
    }

    /**
     * @return bool
     */
    public function unbind()
    {
        return ldap_unbind($this->LDAPResource);
    }
    #endregion
}
