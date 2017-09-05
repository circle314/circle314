<?php

namespace Circle314\Component\Authentication;

abstract class AbstractAuthenticationHandler implements AuthenticationHandlerInterface
{
    public function __construct(AuthenticationConfigurationInterface $configuration)
    {

    }
}

?>