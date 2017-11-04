<?php

namespace Circle314\Component\Schema;

use Circle314\Component\Data\ValueObject\Configuration\DVOConfigurationInterface;

/**
 * Interface SchemaFieldConfigurationInterface
 * @package Circle314\Component\Schema
 * @deprecated 0.6
 * @see DVOConfigurationInterface
 */
interface SchemaFieldConfigurationInterface
{
    /**
     * @return bool
     */
    public function isReadable();

    /**
     * @return bool
     */
    public function isWriteable();

    /**
     * @return void
     */
    public function setReadable();

    /**
     * @return void
     */
    public function setWriteable();

    /**
     * @return void
     */
    public function unsetReadable();

    /**
     * @return void
     */
    public function unsetWriteable();

}
