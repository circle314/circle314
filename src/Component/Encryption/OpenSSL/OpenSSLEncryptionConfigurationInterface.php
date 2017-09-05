<?php

namespace Circle314\Component\Encryption\OpenSSL;

use Circle314\Component\Encryption\EncryptionConfigurationInterface;

interface OpenSSLEncryptionConfigurationInterface extends EncryptionConfigurationInterface
{
    public function getKey();
    public function getMethod();
}

?>