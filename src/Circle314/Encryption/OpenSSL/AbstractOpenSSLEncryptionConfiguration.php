<?php

namespace Circle314\Encryption\OpenSSL;

abstract class AbstractOpenSSLEncryptionConfiguration implements OpenSSLEncryptionConfigurationInterface
{
    /** @var string */
    private $key;

    /** @var string */
    private $method;

    public function __construct($method, $key)
    {
        $this->method           = $method;
        $this->key              = $key;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}

?>