<?php

namespace Circle314\Component\Data\Persistence\Object\Database;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Persistence\Object\PersistenceObjectInterface;

interface DatabaseObjectInterface extends PersistenceObjectInterface
{
    public function objectName(): string;
    public function objectType(): string;
    public function resolvedName(
        DatabaseAccessorInterface $databaseAccessor,
        ?KeyedCollectionInterface $collection = null
    ): string;
    public function schemaName(): string;
}