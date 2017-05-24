<?php

namespace Circle314\Encryption\OpenSSL;

use Circle314\Encryption\EncryptionConfigurationInterface;

interface OpenSSLEncryptionConfigurationInterface extends EncryptionConfigurationInterface
{
    public function getKey();
    public function getMethod();
}

?>