<?php

namespace Circle314\Component\Encoding;

abstract class AbstractEncodingHandler implements EncodingHandlerInterface
{
    #region Constructor
    public function __construct(EncodingConfigurationInterface $encodingConfiguration)
    {
        $this->applyConfiguration($encodingConfiguration);
    }
    #endregion

    #region Abstract Methods
    /**
     * @param EncodingConfigurationInterface $encodingConfiguration
     */
    abstract protected function applyConfiguration(EncodingConfigurationInterface $encodingConfiguration);
    #endregion
}

?>