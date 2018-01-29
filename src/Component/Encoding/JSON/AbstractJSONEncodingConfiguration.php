<?php

namespace Circle314\Component\Encoding\JSON;

abstract class AbstractJSONEncodingConfiguration implements JSONEncodingConfigurationInterface
{
    /** @var int */
    private $depth;

    /** @var int */
    private $options;

    public function __construct($options, $depth)
    {
        $this->options          = $options;
        $this->depth            = $depth;
    }

    /**
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @return int
     */
    public function getOptions()
    {
        return $this->options;
    }
}
