<?php

namespace Circle314\Component\Encryption\OpenSSL;

use Circle314\Component\Encryption\EncryptionHandlerInterface;

interface OpenSSLEncryptionHandlerInterface extends EncryptionHandlerInterface
{
    public function __construct(OpenSSLEncryptionConfigurationInterface $configuration);
}
