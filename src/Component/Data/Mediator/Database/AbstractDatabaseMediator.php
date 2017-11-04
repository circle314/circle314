<?php

namespace Circle314\Component\Data\Mediator\Database;

use Circle314\Component\Data\Operation\Response\ResponseInterface;
use Circle314\Component\Data\Persistence\PersistenceConstants;
use Circle314\Component\Data\Operation\Call\Database\Native\NativeDatabaseCall;
use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Operation\OperationMediatorInterface;
use Circle314\Component\Data\Operation\Response\Database\DatabaseResponseInterface;
use Circle314\Component\Schema\Database\DatabaseTableSchemaInterface;

/**
 * Class AbstractDatabaseMediator
 * @package Circle314\Component\Data\Mediator\Database
 * @deprecated 0.6
 * @see \Circle314\Component\Data\Persistence\Strategy\Database\AbstractDatabasePersistenceStrategy;
 */
abstract class AbstractDatabaseMediator implements DatabaseMediatorInterface
{
    #region Properties
    /** @var DatabaseAccessorInterface */
    private $databaseAccessor;

    /** @var OperationMediatorInterface */
    private $operationMediator;
    #endregion

    #region Constructor
    /**
     * AbstractDatabaseMediator constructor.
     * @param DatabaseAccessorInterface $databaseAccessor
     * @param OperationMediatorInterface $operationMediator
     */
    final public function __construct(
        DatabaseAccessorInterface       $databaseAccessor,
        OperationMediatorInterface       $operationMediator
    ) {
        $this->databaseAccessor         = $databaseAccessor;
        $this->operationMediator        = $operationMediator;
    }
    #endregion

    #region Public Methods
    final public function clearTableCache()
    {
        $this->operationMediator()->clearAllResultsForAccessor($this->databaseAccessor());
    }

    /**
     * @return mixed
     */
    final public function commitTransaction()
    {
        return $this->databaseAccessor()->commitTransaction();
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return DatabaseResponseInterface
     */
    final public function delete($databaseTableSchema)
    {
        $call = $this->prepareDatabaseCall($databaseTableSchema, PersistenceConstants::WRITE);
        $call->setQuery($this->databaseAccessor()->generateDeleteQuery($databaseTableSchema));
        $this->operationMediator()->clearInvalidatedOperationResults($call);
        return $this->operationMediator()->getCallResponse($call);
    }

    /**
     * @param mixed $databaseTableSchema
     * @return ResponseInterface
     */
    final public function get($databaseTableSchema)
    {
        $call = $this->prepareDatabaseCall($databaseTableSchema, PersistenceConstants::READ);
        $call->setQuery($this->databaseAccessor()->generateSelectQuery($databaseTableSchema));
        return $this->operationMediator()->getCallResponse($call);
    }

    /**
     * @param mixed $databaseTableSchema
     * @return DatabaseResponseInterface
     */
    final public function save($databaseTableSchema)
    {
        /** @var DatabaseTableSchemaInterface $databaseTableSchema */
        $call = $this->prepareDatabaseCall($databaseTableSchema, PersistenceConstants::WRITE);
        if($databaseTableSchema->fieldsMarkedAsIdentifiers()->count()) {
            $call->setQuery($this->databaseAccessor()->generateUpdateQuery($databaseTableSchema));
        } else {
            $call->setQuery($this->databaseAccessor()->generateInsertQuery($databaseTableSchema));
        }
        $this->operationMediator()->clearInvalidatedOperationResults($call);
        $response = $this->operationMediator()->getCallResponse($call);
        $databaseTableSchema->markFieldsAsPersisted();
        return $response;
    }
    #endregion

    #region Protected Methods
    /**
     * @return DatabaseAccessorInterface
     */
    final protected function databaseAccessor()
    {
        return $this->databaseAccessor;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @return string
     */
    final protected function generateSaveQuery(DatabaseTableSchemaInterface $databaseTableSchema)
    {
        if($databaseTableSchema->fieldsMarkedAsIdentifiers()->count()) {
            return $this->databaseAccessor()->generateUpdateQuery($databaseTableSchema);
        } else {
            return $this->databaseAccessor()->generateInsertQuery($databaseTableSchema);
        }
    }

    /**
     * @return \Circle314\Component\Data\Operation\OperationMediatorInterface
     */
    final protected function operationMediator()
    {
        return $this->operationMediator;
    }

    /**
     * @param DatabaseTableSchemaInterface $databaseTableSchema
     * @param $readWrite
     * @return NativeDatabaseCall
     */
    final protected function prepareDatabaseCall(DatabaseTableSchemaInterface $databaseTableSchema, $readWrite)
    {
        $call = new NativeDatabaseCall();
        $call->setAccessor($this->databaseAccessor());
        $call->setTableName($this->databaseAccessor()->getFullyQualifiedTableName($databaseTableSchema, $readWrite));
        $call->setParameters($this->databaseAccessor()->generateParameters($databaseTableSchema));
        return $call;
    }
    #endregion

}