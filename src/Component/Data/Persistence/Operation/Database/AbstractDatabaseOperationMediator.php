<?php

namespace Circle314\Component\Data\Persistence\Operation\Database;

use \PDOException;
use \PDOStatement;
use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Database\Native\NativeDatabaseQueryCollectionItem;
use Circle314\Component\Data\Persistence\Operation\Mediator\AbstractOperationMediator;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;

/**
 * Class AbstractDatabaseOperationMediator
 * @package Circle314\Component\Data\Persistence\Operation\Database
 */
abstract class AbstractDatabaseOperationMediator extends AbstractOperationMediator
{
    #region Public Methods
    public function generateResponse(CallInterface $call, AccessorInterface $accessor)
    {
        /** @var DatabaseAccessorInterface $accessor */
        $this->mapQueryBranch($call, [$call, $accessor]);
        /** @var DatabaseQueryCollectionItemInterface $responseCollection */
        $responseCollection = $this->responseCollection($call);
        $PDOStatement = $responseCollection->PDOStatement();

        // Generate response
        foreach($call->parameters() as $parameter) {
            if($parameter->isMarkedAsIdentifier()) {
                $PDOStatement->bindValue(
                    $accessor->configuration()->insertParameterPrefix() . $parameter->fieldName(),
                    $accessor->getPDOParamValue($parameter->identifiedValue()),
                    $accessor->getPDOParamType($parameter->identifiedValue())
                );
            }
            if($parameter->isMarkedAsUpdated()) {
                $PDOStatement->bindValue(
                    $accessor->configuration()->updateParameterPrefix() . $parameter->fieldName(),
                    $accessor->getPDOParamValue($parameter->typedValue()),
                    $accessor->getPDOParamType($parameter->typedValue())
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

        return $this->generateNewResponse($PDOStatement);
    }
    #endregion

    #region Protected Methods
    /**
     * TODO: Write invalidation procedures for database operations.
     * This method currently clears out all resultant operations against a table/view.
     * Ideally, we would be invalidating according to an invalidation procedure. This
     * still needs to have interfaces, abstracts, and natives written.
     * @param CallInterface $call
     */
    protected function invalidateDependantResponses(CallInterface $call)
    {
        if($this->endPointCollection($call)) {
            $this->endPointCollection($call)->clearCollection();
        }
    }
    #endregion

    #region Protected Methods - Overridden
    protected function newResponseCollection($mappingParameters = null)
    {
        /** @var array $mappingParameters */
        $call = $mappingParameters[0];
        $accessor = $mappingParameters[1];
        return new NativeDatabaseQueryCollectionItem($accessor->prepareStatement($call->query()));
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