<?php

namespace Circle314\Component\Data\Persistence\Strategy\Database;

use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Entity\DataEntityInterface;
use Circle314\Component\Data\Persistence\Object\Database\DatabaseObjectInterface;
use Circle314\Component\Data\Persistence\Operation\Call\Native\NativeCall;
use Circle314\Component\Data\Persistence\Operation\Response\Database\DatabaseResponseInterface;
use Circle314\Component\Data\Persistence\Operation\Response\Database\Native\NativeNullDatabaseResponse;
use Circle314\Component\Data\Persistence\Strategy\AbstractPersistenceStrategy;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalDeleteOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalInsertOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalSelectOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalUpdateOperationException;

/**
 * Class AbstractDatabasePersistenceStrategy
 * @package Circle314\Component\Data\Persistence\Strategy
 * @method DatabaseAccessorInterface accessor()
 */
abstract class AbstractDatabasePersistenceStrategy extends AbstractPersistenceStrategy
{
    #region Public Methods
    /**
     * @return DatabaseResponseInterface
     * @throws IllegalDeleteOperationException
     * @inheritdoc
     */
    final public function delete(DataEntityInterface $dataEntity)
    {
        if(!$this->deleteOperationsEnabled()) {
            throw new IllegalDeleteOperationException('SQL delete operations forbidden on  ' . $this->persistenceTarget()->resolvedName($this->accessor()));
        }

        /** @var DatabaseAccessorInterface $accessor */
        $accessor = $this->accessor();
        $call = new NativeCall(
            $accessor->ID(),
            $this->persistenceTarget()->resolvedName($this->accessor()),
            $accessor->generateDeleteQuery($dataEntity, $this->persistenceTarget()),
            $accessor->generateParameters($dataEntity)
        );
        return $this->operationRepository()->response($call, $accessor);
    }

    /**
     * @return DatabaseResponseInterface
     * @throws IllegalDeleteOperationException
     * @inheritdoc
     */
    final public function get(DataEntityInterface $dataEntity)
    {
        if(!$this->selectOperationsEnabled()) {
            throw new IllegalSelectOperationException('SQL select operations forbidden on  ' . $this->persistenceSource()->resolvedName($this->accessor()));
        }

        /** @var DatabaseAccessorInterface $accessor */
        $accessor = $this->accessor();
        $call = new NativeCall(
            $accessor->ID(),
            $this->persistenceSource()->resolvedName($this->accessor()),
            $accessor->generateSelectQuery($dataEntity, $this->persistenceSource()),
            $accessor->generateParameters($dataEntity)
        );
        return $this->operationRepository()->response($call, $accessor);
    }

    /**
     * @return DatabaseResponseInterface
     * @throws IllegalDeleteOperationException
     * @inheritdoc
     */
    final public function save(DataEntityInterface $dataEntity)
    {
        if($dataEntity->hasUpdatedValues() === false) {
            return new NativeNullDatabaseResponse();
        }
        /** @var DatabaseAccessorInterface $accessor */
        $accessor = $this->accessor();
        if($dataEntity->hasFilteringRules()) {
            if(!$this->updateOperationsEnabled()) {
                throw new IllegalUpdateOperationException('SQL update operations forbidden on  ' . $this->persistenceTarget()->resolvedName($this->accessor()));
            }
            $call = new NativeCall(
                $accessor->ID(),
                $this->persistenceTarget()->resolvedName($this->accessor()),
                $accessor->generateUpdateQuery($dataEntity, $this->persistenceTarget()),
                $accessor->generateParameters($dataEntity)
            );
        } else {
            if(!$this->insertOperationsEnabled()) {
                throw new IllegalInsertOperationException('SQL insert operations forbidden on  ' . $this->persistenceTarget()->resolvedName($this->accessor()));
            }
            $call = new NativeCall(
                $accessor->ID(),
                $this->persistenceTarget()->resolvedName($this->accessor()),
                $accessor->generateInsertQuery($dataEntity, $this->persistenceTarget()),
                $accessor->generateParameters($dataEntity)
            );
        }
        $response = $this->operationRepository()->response($call, $accessor);
        $dataEntity->markFieldsAsPersisted();
        return $response;
    }
    #endregion

    #region Abstract Methods
    /**
     * The source database object used in select operations.
     *
     * @return DatabaseObjectInterface
     * @since 0.7
     */
    abstract protected function persistenceSource(): DatabaseObjectInterface;

    /**
     * The target database object used in delete, insert, and update operations.
     *
     * @return DatabaseObjectInterface
     * @since 0.7
     */
    abstract protected function persistenceTarget(): DatabaseObjectInterface;
    #endregion
}