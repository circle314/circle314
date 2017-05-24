<?php

namespace Circle314\Data\Operation\Database;

use \PDOStatement;
use Circle314\Collection\KeyedCollectionInterface;
use Circle314\Collection\CollectionItemInterface;

interface DatabaseQueryBranchInterface extends CollectionItemInterface
{
    /**
     * @return KeyedCollectionInterface
     */
    public function getResponseCollection();

    /**
     * @return PDOStatement;
     */
    public function getPDOStatement();
}