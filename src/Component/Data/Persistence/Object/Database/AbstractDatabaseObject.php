<?php

namespace Circle314\Component\Data\Persistence\Object\Database;

use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;

abstract class AbstractDatabaseObject implements DatabaseObjectInterface
{
    #region Properties
    private $objectName;
    private $schemaName;
    #endregion

    #region Constructor
    public function __construct(
        string $schemeName,
        string $objectName
    ) {
        $this->schemaName = $schemeName;
        $this->objectName = $objectName;
    }
    #endregion

    #region Public Methods
    final public function objectName(): string
    {
        return $this->objectName;
    }

    final public function schemaName(): string
    {
        return $this->schemaName;
    }
    #endregion

    #region Abstract Public Methods
    abstract public function objectType(): string;
    abstract public function resolvedName(
        DatabaseAccessorInterface $databaseAccessor,
        ?KeyedCollectionInterface $collection = null
    ): string;
    #endregion
}