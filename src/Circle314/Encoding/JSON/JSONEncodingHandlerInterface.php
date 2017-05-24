<?php

namespace Circle314\Encoding\JSON;

use Circle314\Encoding\EncodingHandlerInterface;

interface JSONEncodingHandlerInterface extends EncodingHandlerInterface
{
    /**
     * JSONEncodingHandlerInterface constructor.
     * @param JSONEncodingConfigurationInterface $configuration
     */
    public function __construct(JSONEncodingConfigurationInterface $configuration);
}

?>