<?php

namespace Circle314\Component\Encoding\JSON;

use Circle314\Component\Encoding\AbstractEncodingHandler;
use Circle314\Component\Encoding\EncodingConfigurationInterface;
use Circle314\Component\Encoding\Exception\DecodingFailedException;

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
    public function canBeDecoded($data): bool
    {
        json_decode(
            $data,
            $this->configuration()->getOptions(),
            $this->configuration()->getDepth()
        );
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function canBeEncoded($data): bool
    {
        if(is_resource($data)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $data
     * @return mixed
     * @throws
     */
    public function decode(
        $data
    ) {
        if(!$this->canBeDecoded($data)) {
            throw new DecodingFailedException('Failed to decode data to JSON. Data provided: ' . var_export($data, true));
        }
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
