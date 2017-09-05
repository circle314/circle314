<?php

namespace Circle314\Component\Schema;

use Circle314\Concept\Persistence\PersistenceConstants;

abstract class AbstractSchemaFieldConfiguration implements SchemaFieldConfigurationInterface
{
    #region Properties
    private $readWriteFlags = 0;
    #endregion

    #region
    public function isReadable()
    {
        return $this->readWriteFlags & PersistenceConstants::BIT_READ;
    }

    public function isWriteable()
    {
        return $this->readWriteFlags & PersistenceConstants::BIT_WRITE;
    }

    public function setReadable()
    {
        $this->readWriteFlags |= PersistenceConstants::BIT_READ;
    }

    public function setWriteable()
    {
        $this->readWriteFlags |= PersistenceConstants::BIT_WRITE;
    }

    public function unsetReadable()
    {
        $this->readWriteFlags ^= PersistenceConstants::BIT_READ;
    }

    public function unsetWriteable()
    {
        $this->readWriteFlags ^= PersistenceConstants::BIT_WRITE;
    }
}