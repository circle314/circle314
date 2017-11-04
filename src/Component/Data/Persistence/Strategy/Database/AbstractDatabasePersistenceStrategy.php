<?php

namespace Circle314\Component\Data\Persistence\Strategy\Database;

use Circle314\Component\Data\Persistence\Operation\Call\Native\NativeCall;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Persistence\Strategy\AbstractPersistenceStrategy;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalDeleteOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalInsertOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalSelectOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalUpdateOperationException;
use Circle314\Transitional\TransitionalDataEntityInterface;

/**
 * Class AbstractDatabasePersistenceStrategy
 * @package Circle314\Component\Data\Persistence\Strategy
 */
abstract class AbstractDatabasePersistenceStrategy extends AbstractPersistenceStrategy
{
    #region Public Methods
    final public function delete(TransitionalDataEntityInterface $dataEntity) : ResponseInterface
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
            $dataEntity
        );
        return $this->operationMediator()->response($call, $accessor);
    }

    final public function get(TransitionalDataEntityInterface $dataEntity) : ResponseInterface
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
            $dataEntity
        );
        return $this->operationMediator()->response($call, $accessor);
    }

    final public function save(TransitionalDataEntityInterface $dataEntity) : ResponseInterface
    {
        /** @var DatabaseAccessorInterface $accessor */
        $accessor = $this->accessor();
        if($dataEntity->fieldsMarkedAsIdentifiers()->count()) {
            if(!$this->updateOperationsEnabled()) {
                throw new IllegalUpdateOperationException('SQL update operations forbidden on  ' . $this->targetSchema() . '.' . $this->targetTable());
            }
            $call = new NativeCall(
                $accessor->ID(),
                $this->sourceSchema() . '.' . $this->sourceTable(),
                $accessor->generateUpdateQuery($dataEntity, $this->sourceSchema(), $this->sourceTable()),
                $dataEntity
            );
        } else {
            if(!$this->insertOperationsEnabled()) {
                throw new IllegalInsertOperationException('SQL insert operations forbidden on  ' . $this->targetSchema() . '.' . $this->targetTable());
            }
            $call = new NativeCall(
                $accessor->ID(),
                $this->sourceSchema() . '.' . $this->sourceTable(),
                $accessor->generateInsertQuery($dataEntity, $this->sourceSchema(), $this->sourceTable()),
                $dataEntity
            );
        }
        $response = $this->operationMediator()->response($call, $accessor);
        $dataEntity->markFieldsAsPersisted();
        return $response;
    }
    #endregion

    #region Abstract Methods
    abstract protected function sourceSchema(): ?string;
    abstract protected function sourceTable(): ?string;
    abstract protected function targetSchema(): ?string;
    abstract protected function targetTable(): ?string;
    #endregion
}