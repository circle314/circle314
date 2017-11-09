<?php

namespace Circle314\Component\Data\ValueObject\Configuration;

use Circle314\Component\Data\Persistence\PersistenceConstants;

abstract class AbstractDVOConfiguration implements DVOConfigurationInterface
{
    #region Properties
    private $readWriteFlags = 0;
    #endregion

    #region
    public function isReadable(): bool
    {
        return $this->readWriteFlags & PersistenceConstants::BIT_READ;
    }

    public function isWriteable(): bool
    {
        return $this->readWriteFlags & PersistenceConstants::BIT_WRITE;
    }

    public function setReadable(): void
    {
        $this->readWriteFlags |= PersistenceConstants::BIT_READ;
    }

    public function setWriteable(): void
    {
        $this->readWriteFlags |= PersistenceConstants::BIT_WRITE;
    }

    public function unsetReadable(): void
    {
        $this->readWriteFlags ^= PersistenceConstants::BIT_READ;
    }

    public function unsetWriteable(): void
    {
        $this->readWriteFlags ^= PersistenceConstants::BIT_WRITE;
    }
}