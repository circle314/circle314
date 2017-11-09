<?php

namespace Circle314\Component\Data\ValueObject\Configuration;

interface DVOConfigurationInterface
{
    /**
     * Checks whether the field is readable.
     *
     * @return bool
     */
    public function isReadable(): bool;

    /**
     * Checks whether the field is writeable.
     *
     * @return bool
     */
    public function isWriteable(): bool;

    /**
     * Adds the read flag to the field.
     *
     * @return void
     */
    public function setReadable(): void;

    /**
     * Adds the write flag to the field.
     *
     * @return void
     */
    public function setWriteable(): void;

    /**
     * Removes the read flag from the field.
     *
     * @return void
     */
    public function unsetReadable(): void;

    /**
     * Removes the write flag from the field.
     *
     * @return void
     */
    public function unsetWriteable(): void;

}
