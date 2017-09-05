<?php

namespace Circle314\Component\Encryption;

abstract class AbstractEncryptionHandler implements EncryptionHandlerInterface
{
    #region Constructor
    public function __construct(EncryptionConfigurationInterface $encryptionConfiguration)
    {
        $this->applyConfiguration($encryptionConfiguration);
    }
    #endregion

    /**
     * @param EncryptionConfigurationInterface $encryptionConfiguration
     */
    abstract protected function applyConfiguration(EncryptionConfigurationInterface $encryptionConfiguration);
}

?>