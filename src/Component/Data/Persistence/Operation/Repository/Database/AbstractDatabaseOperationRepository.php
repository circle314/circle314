<?php

namespace Circle314\Component\Data\Persistence\Operation\Repository\Database;

use Circle314\Component\Collection\CollectionConstants;
use Circle314\Component\Type\TypeInterface\TypeInterface;
use \PDOException;
use \PDOStatement;
use Circle314\Component\Data\Accessor\AccessorInterface;
use Circle314\Component\Data\Accessor\Database\DatabaseAccessorInterface;
use Circle314\Component\Data\Persistence\Operation\Cache\Database\DatabaseQueryInterface;
use Circle314\Component\Data\Persistence\Operation\Call\CallInterface;
use Circle314\Component\Data\Persistence\Operation\Response\Database\DatabaseResponseInterface;
use Circle314\Component\Data\Persistence\Operation\Repository\AbstractOperationRepository;

/**
 * Class AbstractDatabaseOperationMediator
 * @package Circle314\Component\Data\Persistence\Operation\Database
 */
abstract class AbstractDatabaseOperationRepository extends AbstractOperationRepository
{
    #region Public Methods
    protected function generateResponse(CallInterface $call, AccessorInterface $accessor)
    {
        /** @var DatabaseAccessorInterface $accessor */
        /** @var DatabaseQueryInterface $query */
        $query = $this->operationCache()->query($call, $accessor);
        $PDOStatement = $query->PDOStatement();

        // Generate response
        /**
         * @var string $parameterIndex
         * @var TypeInterface $parameterTypedValue
         */
        foreach($call->parameters() as $parameterIndex => $parameterTypedValue) {
            $PDOStatement->bindValue(
                str_replace(CollectionConstants::_COLLECTION_KEY_PREFIX, '', $parameterIndex),
                $accessor->getPDOParamValue($parameterTypedValue),
                $accessor->getPDOParamType($parameterTypedValue)
            );
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
     * Generates a new Response from a PDOStatement.
     *
     * @param PDOStatement $PDOStatement The PDOStatement that generates the Response.
     * @return DatabaseResponseInterface
     */
    abstract protected function generateNewResponse(PDOStatement $PDOStatement);
    #endregion
}