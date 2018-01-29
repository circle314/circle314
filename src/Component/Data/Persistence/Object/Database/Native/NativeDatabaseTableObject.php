<?php

namespace Circle314\Component\Data\Persistence\Object\Database\Native;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Persistence\Object\Database\AbstractDatabaseObject;
use Circle314\Component\Data\Persistence\Object\Database\DatabaseObjectConstants;

class NativeDatabaseTableObject extends AbstractDatabaseObject
{
    #region Public Methods
    public function objectType(): string
    {
        return DatabaseObjectConstants::_TABLE;
    }

    public function resolvedName(
        DatabaseAccessorInterface $databaseAccessor,
        ?KeyedCollectionInterface $collection = null
    ): string {
        $schema = $databaseAccessor->configuration()->openingIdentityDelimiter()
            . $this->schemaName()
            . $databaseAccessor->configuration()->closingIdentityDelimiter()
            . '.'
        ;
        $table = $databaseAccessor->configuration()->openingIdentityDelimiter()
            . $this->objectName()
            . $databaseAccessor->configuration()->closingIdentityDelimiter()
        ;
        return $schema . $table;
    }
    #endregion
}