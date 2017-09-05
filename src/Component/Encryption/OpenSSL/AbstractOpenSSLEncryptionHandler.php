<?php

namespace Circle314\Component\Encryption\OpenSSL;

use Circle314\Component\Encryption\AbstractEncryptionHandler;
use Circle314\Component\Encryption\EncryptionConfigurationInterface;

abstract class AbstractOpenSSLEncryptionHandler extends AbstractEncryptionHandler implements OpenSSLEncryptionHandlerInterface
{
    #region Properties
    /** @var OpenSSLEncryptionConfigurationInterface */
    private $configuration;
    #endregion

    #region Constructor
    public function __construct(OpenSSLEncryptionConfigurationInterface $openSSLEncryptionConfiguration)
    {
        parent::__construct($openSSLEncryptionConfiguration);
    }
    #endregion

    #region Public Methods
    public function decrypt(
        $data,
        $options = 0,
        $initialisationVector = ''
    ) {
        return openssl_decrypt(
            $data,
            $this->configuration()->getMethod(),
            $this->configuration()->getKey(),
            $options,
            $initialisationVector
        );
    }

    public function encrypt(
        $data,
        $options = 0,
        $initialisationVector = ''
    )
    {
        return openssl_encrypt(
            $data,
            $this->configuration()->getMethod(),
            $this->configuration()->getKey(),
            $options,
            $initialisationVector
        );
    }
    #endregion

    #region Protected Methods
    /**
     * @param EncryptionConfigurationInterface $encryptionConfiguration
     */
    protected function applyConfiguration(EncryptionConfigurationInterface $encryptionConfiguration)
    {
        $this->configuration = $encryptionConfiguration;
    }

    /**
     * @return OpenSSLEncryptionConfigurationInterface
     */
    protected function configuration()
    {
        return $this->configuration;
    }
    #endregion
}

?>