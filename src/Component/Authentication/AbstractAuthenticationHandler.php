<?php

namespace Circle314\Component\Authentication;

/**
 * Class AbstractAuthenticationHandler
 * @package Circle314\Component\Authentication
 * @deprecated 0.7
 */
abstract class AbstractAuthenticationHandler implements AuthenticationHandlerInterface
{
    public function __construct(AuthenticationConfigurationInterface $configuration)
    {

    }
}
