<?php

namespace Circle314\Component\Encoding\JSON;

use Circle314\Component\Encoding\EncodingConfigurationInterface;

interface JSONEncodingConfigurationInterface extends EncodingConfigurationInterface
{
    public function getDepth();
    public function getOptions();
}

?>