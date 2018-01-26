<?php

namespace Circle314\Component\Data\Persistence\Strategy\Database;

use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Entity\DataEntityInterface;
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
            throw new IllegalDeleteOperationException('SQL delete operations forbidden on  ' . $this->targetSchema() . '.' . $this->targetTable());
        }

        /** @var DatabaseAccessorInterface $accessor */
        $accessor = $this->accessor();
        $call = new NativeCall(
            $accessor->ID(),
            $this->targetSchema() . '.' . $this->targetTable(),
            $accessor->generateDeleteQuery($dataEntity, $this->targetSchema(), $this->targetTable()),
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
            throw new IllegalSelectOperationException('SQL select operations forbidden on  ' . $this->targetSchema() . '.' . $this->targetTable());
        }

        /** @var DatabaseAccessorInterface $accessor */
        $accessor = $this->accessor();
        $call = new NativeCall(
            $accessor->ID(),
            $this->sourceSchema() . '.' . $this->sourceTable(),
            $accessor->generateSelectQuery($dataEntity, $this->sourceSchema(), $this->sourceTable()),
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
        if($dataEntity->fieldsMarkedForUpdate()->count() === 0) {
            return new NativeNullDatabaseResponse();
        }
        /** @var DatabaseAccessorInterface $accessor */
        $accessor = $this->accessor();
        if($dataEntity->fieldsMarkedAsIdentifiers()->count()) {
            if(!$this->updateOperationsEnabled()) {
                throw new IllegalUpdateOperationException('SQL update operations forbidden on  ' . $this->targetSchema() . '.' . $this->targetTable());
            }
            $call = new NativeCall(
                $accessor->ID(),
                $this->targetSchema() . '.' . $this->targetTable(),
                $accessor->generateUpdateQuery($dataEntity, $this->targetSchema(), $this->targetTable()),
                $accessor->generateParameters($dataEntity)
            );
        } else {
            if(!$this->insertOperationsEnabled()) {
                throw new IllegalInsertOperationException('SQL insert operations forbidden on  ' . $this->targetSchema() . '.' . $this->targetTable());
            }
            $call = new NativeCall(
                $accessor->ID(),
                $this->targetSchema() . '.' . $this->targetTable(),
                $accessor->generateInsertQuery($dataEntity, $this->targetSchema(), $this->targetTable()),
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
     * The source schema used in select operations.
     *
     * @return null|string
     */
    abstract protected function sourceSchema(): ?string;

    /**
     * The source table used in select operations.
     *
     * @return null|string
     */
    abstract protected function sourceTable(): ?string;

    /**
     * The target schema used in delete, insert, and update operations.
     *
     * @return null|string
     */
    abstract protected function targetSchema(): ?string;

    /**
     * The target table used in delete, insert, and update operations.
     *
     * @return null|string
     */
    abstract protected function targetTable(): ?string;
    #endregion
}