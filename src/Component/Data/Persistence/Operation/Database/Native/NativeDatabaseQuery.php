<?php

namespace Circle314\Component\Data\Persistence\Operation\Database\Native;

use \PDOStatement;
use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;
use Circle314\Component\Data\Persistence\Operation\Database\DatabaseQueryInterface;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Component\Collection\KeyedCollectionInterface;
use Circle314\Component\Collection\Native\NativeKeyedCollection;

/**
 * Class AbstractDatabaseQueryBranchCollection
 * @package Circle314\Component\Data\Persistence\Operation\Database
 */
class NativeDatabaseQuery implements DatabaseQueryInterface
{
    #region Properties
    private $ID;

    /** @var KeyedCollectionInterface */
    private $responseCollection;

    /** @var PDOStatement */
    private $PDOStatement;
    #endregion

    #region Constructor
    /**
     * NativeDatabaseQuery constructor.
     * @param $ID
     * @param CallInterface $call
     * @param AccessorInterface $accessor
     */
    public function __construct($ID, CallInterface $call, AccessorInterface $accessor)
    {
        /** @var $accessor DatabaseAccessorInterface */
        $this->ID = $ID;
        $this->PDOStatement = $accessor->prepareStatement($call->query());
        $this->responseCollection = new NativeKeyedCollection();
    }

    public function getResponse($ID): ResponseInterface
    {
        return $this->responseCollection->getID($ID);
    }

    public function hasResponse($ID): bool
    {
        return $this->responseCollection->hasID($ID);
    }

    public function ID()
    {
        return $this->ID;
    }

    public function PDOStatement() : PDOStatement
    {
        return $this->PDOStatement;
    }

    public function saveResponse($ID, $response): void
    {
        $this->responseCollection->saveID($ID, $response);
    }
    #endregion
}