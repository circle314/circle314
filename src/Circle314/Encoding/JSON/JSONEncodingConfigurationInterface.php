<?php

namespace Circle314\Encoding\JSON;

use Circle314\Encoding\EncodingConfigurationInterface;

interface JSONEncodingConfigurationInterface extends EncodingConfigurationInterface
{
    public function getDepth();
    public function getOptions();
}

?>