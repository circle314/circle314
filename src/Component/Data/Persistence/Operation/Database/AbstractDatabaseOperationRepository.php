<?php

namespace Circle314\Component\Data\Persistence\Operation\Database;

use \PDOException;
use \PDOStatement;
use Circle314\Component\Data\Persistence\Operation\Response\ResponseInterface;
use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Repository\AbstractOperationRepository;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;

/**
 * Class AbstractDatabaseOperationMediator
 * @package Circle314\Component\Data\Persistence\Operation\Database
 */
abstract class AbstractDatabaseOperationRepository extends AbstractOperationRepository
{
    #region Public Methods
    protected function generateResponse(CallInterface $call, AccessorInterface $accessor): ResponseInterface
    {
        /** @var DatabaseAccessorInterface $accessor */
        /** @var DatabaseQueryInterface $query */
        $query = $this->operationCache()->query($call, $accessor);
        $PDOStatement = $query->PDOStatement();

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

    #region Abstract Methods
    /**
     * @param PDOStatement $PDOStatement
     * @return mixed
     */
    abstract protected function generateNewResponse(PDOStatement $PDOStatement);
    #endregion
}