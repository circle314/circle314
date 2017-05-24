<?php

namespace Circle314\Authentication;

abstract class AbstractAuthenticationHandler implements AuthenticationHandlerInterface
{
    public function __construct(AuthenticationConfigurationInterface $configuration)
    {

    }
}

?>