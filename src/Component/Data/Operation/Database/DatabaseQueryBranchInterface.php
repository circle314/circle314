<?php

namespace Circle314\Component\Data\Operation\Database;

use \PDOStatement;
use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Collection\CollectionItemInterface;

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