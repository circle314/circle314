<?php

namespace Circle314\Data\Operation\Database;

use \PDO;
use \PDOException;
use \PDOStatement;
use Circle314\Concept\Null\NullConstants;
use Circle314\Collection\KeyedCollectionInterface;
use Circle314\Collection\Native\NativeKeyedCollection;
use Circle314\Data\Operation\AbstractOperationMediator;
use Circle314\Data\Operation\Call\CallInterface;
use Circle314\Data\Operation\Call\Database\DatabaseCallInterface;
use Circle314\Data\Operation\Response\Database\DatabaseResponseInterface;

/**
 * Class AbstractDatabaseOperationMediator
 * @package Circle314\Data\Operation\Database
 * @method DatabaseQueryBranchInterface getQueryBranch(CallInterface $call)
 */
abstract class AbstractDatabaseOperationMediator extends AbstractOperationMediator
{
    #region Public Methods
    public function clearInvalidatedOperationResults(CallInterface $call)
    {
        if($this->operationRepository()->hasID($this->getTableBranchName($call))) {
            $this->getTableBranch($call)->clearCollection();
        }
    }

    /**
     * @param CallInterface $call
     * @return mixed
     */
    public function getCallResponse(CallInterface $call)
    {
        /** @var DatabaseCallInterface $call */
        // Ensure the existence of an associated PDO Statement
        $this->ensureQueryBranchExistsInOperationRepository($call);
        $PDOStatement = $this->getQueryBranch($call)->getPDOStatement();

        // Generate response if not yet done
        if($this->getResponse($call) === NullConstants::NO_RESPONSE_EXISTS) {
            foreach($call->getParameters() as $parameter) {
                if($parameter->isMarkedAsIdentifier()) {
                    $PDOStatement->bindValue(
                        $call->getAccessor()->configuration()->insertParameterPrefix() . $parameter->fieldName(),
                        $call->getAccessor()->getPDOParamValue($parameter->identifiedValue()),
                        $call->getAccessor()->getPDOParamType($parameter->identifiedValue())
                    );
                }
                if($parameter->isMarkedAsUpdated()) {
                    $PDOStatement->bindValue(
                        $call->getAccessor()->configuration()->updateParameterPrefix() . $parameter->fieldName(),
                        $call->getAccessor()->getPDOParamValue($parameter->typedValue()),
                        $call->getAccessor()->getPDOParamType($parameter->typedValue())
                    );
                }
            }
            try {
                $PDOStatement->execute();
            } catch(PDOException $e) {
                $output = $e->getMessage() . PHP_EOL;
                $output .= 'Failed query is: ' . $PDOStatement->queryString . PHP_EOL;
                throw new PDOException($output);
            }
            $this->getQueryBranch($call)->getResponseCollection()->saveID(
                $this->getResponseName($call),
                $this->generateNewResponse($PDOStatement)
            );
        }

        return $this->getResponse($call);
    }
    #endregion

    #region Protected Functions - Overridden
    /**
     * @param CallInterface $call
     * @return DatabaseResponseInterface|string
     */
    protected function getResponse(CallInterface $call)
    {
        if(!$this->getResponseParent($call)->getResponseCollection()->hasID($this->getResponseName($call))) {
            return NullConstants::NO_RESPONSE_EXISTS;
        } else {
            return $this->getResponseParent($call)->getResponseCollection()->getID($this->getResponseName($call));
        }
    }
    #endregion

    #region Protected Methods - New Branches
    protected function ensureTableBranchExistsInOperationRepository(CallInterface $call)
    {
        $this->ensureAccessorBranchExistsInOperationRepository($call);
        $this->getAccessorBranch($call)->saveID($this->getTableBranchName($call), $this->generateNewTableBranch());
    }

    /**
     * @return NativeKeyedCollection
     */
    protected function generateNewTableBranch()
    {
        return new NativeKeyedCollection();
    }

    /**
     * @param CallInterface $call
     * @return KeyedCollectionInterface
     */
    protected function getTableBranch(CallInterface $call)
    {
        /** @var DatabaseCallInterface $call */
        return $this->getAccessorBranch($call)->getID($this->getTableBranchName($call));
    }

    /**
     * @param CallInterface $call
     * @return string
     */
    protected function getTableBranchName(CallInterface $call)
    {
        /** @var $call DatabaseCallInterface */
        return $call->getTableName();
    }
    #endregion

    #region Protected Methods - Generic Branches
    /**
     * @param CallInterface $call
     * @return mixed
     */
    protected function ensureQueryBranchParentExistsInOperationRepository(CallInterface $call)
    {
        return $this->ensureTableBranchExistsInOperationRepository($call);
    }

    /**
     * @param CallInterface $call
     * @return mixed
     */
    protected function ensureResponseLeafParentExistsInOperationRepository(CallInterface $call)
    {
        return $this->ensureQueryBranchExistsInOperationRepository($call);
    }

    /**
     * @param CallInterface $call
     * @return mixed
     */
    protected function generateNewAccessorBranch(CallInterface $call)
    {
        return new NativeKeyedCollection();
    }

    /**
     * @param CallInterface $call
     * @return mixed
     */
    protected function getQueryBranchParent(CallInterface $call)
    {
        return $this->getTableBranch($call);
    }

    /**
     * @param CallInterface $call
     * @return DatabaseQueryBranchInterface
     */
    protected function getResponseParent(CallInterface $call)
    {
        return $this->getQueryBranch($call);
    }
    #endregion

    #region Abstract Methods
    /**
     * @param PDOStatement $PDOStatement
     * @return mixed
     */
    abstract protected function generateNewResponse(PDOStatement $PDOStatement);
    #endregion
}