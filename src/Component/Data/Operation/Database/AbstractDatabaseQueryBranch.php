<?php

namespace Circle314\Component\Data\Operation\Database;

use \PDOStatement;
use Circle314\Component\Collection\KeyedCollectionInterface;

/**
 * Class AbstractDatabaseQueryBranchCollection
 * @package Circle314\Component\Data\Operation\Database
 */
abstract class AbstractDatabaseQueryBranch implements DatabaseQueryBranchInterface
{
    #region Properties
    /** @var KeyedCollectionInterface */
    private $responseCollection;

    /** @var PDOStatement */
    private $PDOStatement;
    #endregion

    #region Constructor
    /**
     * AbstractDatabaseQueryBranchCollectionItem constructor.
     * @param PDOStatement $PDOStatement
     * @param KeyedCollectionInterface $responseCollection
     */
    public function __construct(PDOStatement $PDOStatement, KeyedCollectionInterface $responseCollection)
    {
        $this->PDOStatement = $PDOStatement;
        $this->responseCollection = $responseCollection;
    }

    /**
     * @return KeyedCollectionInterface
     */
    public function getResponseCollection()
    {
        return $this->responseCollection;
    }

    /**
     * @return PDOStatement
     */
    public function getPDOStatement()
    {
        return $this->PDOStatement;
    }
    #endregion
}