<?php

namespace Circle314\Component\Data\Operation\Database;

use \PDOStatement;
use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Collection\CollectionItemInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Database\DatabaseQueryInterface;

/**
 * Interface DatabaseQueryBranchInterface
 * @package Circle314\Component\Data\Operation\Database
 * @deprecated 0.6
 * @see DatabaseQueryInterface
 */
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