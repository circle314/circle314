<?php

namespace Circle314\Encryption\OpenSSL;

use Circle314\Encryption\EncryptionHandlerInterface;

interface OpenSSLEncryptionHandlerInterface extends EncryptionHandlerInterface
{
    public function __construct(OpenSSLEncryptionConfigurationInterface $configuration);
}

?>