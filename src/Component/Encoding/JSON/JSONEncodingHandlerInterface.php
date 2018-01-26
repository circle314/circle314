<?php

namespace Circle314\Component\Encoding\JSON;

use Circle314\Component\Encoding\EncodingHandlerInterface;

interface JSONEncodingHandlerInterface extends EncodingHandlerInterface
{
    /**
     * JSONEncodingHandlerInterface constructor.
     * @param JSONEncodingConfigurationInterface $configuration
     */
    public function __construct(JSONEncodingConfigurationInterface $configuration);
}
