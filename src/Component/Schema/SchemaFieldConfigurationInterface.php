<?php

namespace Circle314\Component\Schema;

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
