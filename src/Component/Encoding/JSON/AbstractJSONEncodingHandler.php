<?php

namespace Circle314\Component\Encoding\JSON;

use Circle314\Component\Encoding\AbstractEncodingHandler;
use Circle314\Component\Encoding\EncodingConfigurationInterface;

abstract class AbstractJSONEncodingHandler extends AbstractEncodingHandler implements JSONEncodingHandlerInterface
{
    #region Properties
    /** @var JSONEncodingConfigurationInterface */
    private $configuration;
    #endregion

    #region Constructor
    /**
     * AbstractJSONEncodingHandler constructor.
     * @param JSONEncodingConfigurationInterface $JSONEncodingConfiguration
     */
    public function __construct(JSONEncodingConfigurationInterface $JSONEncodingConfiguration)
    {
        parent::__construct($JSONEncodingConfiguration);
    }
    #endregion

    #region Public Methods
    /**
     * @param $data
     * @return mixed
     */
    public function decode(
        $data
    ) {
        return json_decode(
            $data,
            $this->configuration()->getOptions(),
            $this->configuration()->getDepth()
        );
    }

    /**
     * @param $data
     * @return string
     */
    public function encode(
        $data
    )
    {
        return json_encode(
            $data,
            $this->configuration()->getOptions(),
            $this->configuration()->getDepth()
        );
    }
    #endregion

    #region Protected Methods
    /**
     * @param EncodingConfigurationInterface $encodingConfiguration
     */
    protected function applyConfiguration(EncodingConfigurationInterface $encodingConfiguration)
    {
        $this->configuration = $encodingConfiguration;
    }

    /**
     * @return JSONEncodingConfigurationInterface
     */
    protected function configuration()
    {
        return $this->configuration;
    }
    #endregion
}

?>