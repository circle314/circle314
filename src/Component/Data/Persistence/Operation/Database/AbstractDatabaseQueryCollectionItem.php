<?php

namespace Circle314\Component\Data\Persistence\Operation\Database;

use \PDOStatement;
use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Collection\Native\NativeKeyedCollection;

/**
 * Class AbstractDatabaseQueryBranchCollection
 * @package Circle314\Component\Data\Persistence\Operation\Database
 */
abstract class AbstractDatabaseQueryCollectionItem implements DatabaseQueryCollectionItemInterface
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
     */
    public function __construct(PDOStatement $PDOStatement)
    {
        $this->PDOStatement = $PDOStatement;
        $this->responseCollection = new NativeKeyedCollection();
    }

    public function getID($ID)
    {
        return $this->responseCollection->getID($ID);
    }

    public function hasID($ID)
    {
        return $this->responseCollection->hasID($ID);
    }

    public function PDOStatement() : PDOStatement
    {
        return $this->PDOStatement;
    }

    public function saveID($ID, $response)
    {
        return $this->responseCollection->saveID($ID, $response);
    }
    #endregion
}