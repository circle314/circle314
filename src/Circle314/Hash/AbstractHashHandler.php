<?php

namespace Circle314\Hash;

abstract class AbstractHashHandler implements HashHandlerInterface
{
    #region Properties
    /** @var HashConfigurationInterface */
    private $configuration;
    #endregion

    #region Constructor
    public function __construct(HashConfigurationInterface $hashConfiguration)
    {
        $this->applyConfiguration($hashConfiguration);
    }
    #endregion

    #region Public Methods
    /**
     * @param $data
     * @return string
     */
    public function hash($data)
    {
        return hash($this->configuration()->algorithm(), $data);
    }
    #endregion

    #region Private Methods
    /**
     * @param HashConfigurationInterface $hashConfiguration
     */
    private function applyConfiguration(HashConfigurationInterface $hashConfiguration)
    {
        $this->configuration = $hashConfiguration;
    }

    /**
     * @return HashConfigurationInterface
     */
    private function configuration()
    {
        return $this->configuration;
    }
    #endregion
}

?>