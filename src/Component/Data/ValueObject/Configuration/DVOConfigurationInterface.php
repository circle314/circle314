<?php

namespace Circle314\Component\Data\ValueObject\Configuration;

interface DVOConfigurationInterface
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
