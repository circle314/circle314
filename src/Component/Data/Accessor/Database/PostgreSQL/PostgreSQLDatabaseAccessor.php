<?php

namespace Circle314\Component\Data\Accessor\Database\PostgreSQL;

use Circle314\Component\Data\Entity\DataEntityInterface;
use Circle314\Component\Data\Operator\Native\EqualToOperator;
use Circle314\Component\Data\Operator\Native\GreaterThanOperator;
use Circle314\Component\Data\Operator\Native\GreaterThanOrEqualToOperator;
use Circle314\Component\Data\Operator\Native\LessThanOperator;
use Circle314\Component\Data\Operator\Native\LessThanOrEqualToOperator;
use Circle314\Component\Data\Operator\Native\NotEqualToOperator;
use Circle314\Component\Data\Persistence\Object\Database\DatabaseObjectInterface;
use Circle314\Component\Data\ValueObject\DVOInterface;
use Circle314\Component\Data\ValueObject\FilterRule\FilterRuleInterface;
use \Exception;
use \PDO;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalDeleteOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalInsertOperationException;
use Circle314\Component\Data\Persistence\Strategy\Exception\IllegalUpdateOperationException;
use Circle314\Component\Data\Accessor\Database\AbstractDatabaseAccessor;

/**
 * Class PostgreSQLDatabaseAccessor
 * @package Circle314\Component\Data
 * @method PostgreSQLDatabaseConfiguration configuration()
 */
class PostgreSQLDatabaseAccessor extends AbstractDatabaseAccessor
{
    /**
     * PostgreSQLDatabaseAccessor constructor.
     * @param $configuration PostgreSQLDatabaseConfiguration
     */
    final public function __construct(PostgreSQLDatabaseConfiguration $configuration)
    {
        parent::__construct($configuration);
    }

    #region Public methods
    /**
     * @return bool
     * @throws \Exception
     */
    public function connect() {
        if(is_null($this->configuration())) {
            throw new Exception('PostgreSQL Database Configuration not set');
        }

        // Only attempt to connect if a connection does not already exist
        if($this->PDO() === null) {
            // Attempt to connect
            $dsn = 'pgsql:host=' .
                $this->configuration()->getServerIP() .
                ($this->configuration()->getDatabaseName() ? ';dbname=' . $this->configuration()->getDatabaseName() : '')
            ;
            $this->setPDO(
                new PDO(
                    $dsn,
                    $this->configuration()->getUsername(),
                    $this->configuration()->getPassword(),
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
                        PDO::ATTR_EMULATE_PREPARES => true,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                )
            );
            $this->setIsConnectionEstablished(true);
        }

        if(!$this->isInTransaction()) {
            $this->beginTransaction();
        }

        return true;
    }

    /**
     * @inheritdoc
     * @throws IllegalDeleteOperationException
     */
    public function generateDeleteQuery(DataEntityInterface $dataEntity, DatabaseObjectInterface $databaseObject)
    {
        if($dataEntity->hasFilteringRules() === false) {
            throw new IllegalDeleteOperationException('Cannot generate an SQL DELETE query without and filtering rules');
        }

        $query =
            'DELETE FROM '
            . $databaseObject->resolvedName($this)
            . $this->generateWhereClauses($dataEntity)
            . ';'
        ;
        return $query;
    }

    /**
     * @inheritdoc
     * @throws IllegalInsertOperationException
     */
    public function generateInsertQuery(DataEntityInterface $dataEntity, DatabaseObjectInterface $databaseObject)
    {
        if(!$dataEntity->hasUpdatedValues())
        {
            throw new IllegalInsertOperationException('Cannot generate an SQL INSERT query without any updated fields');
        }

        $query =
            'INSERT INTO '
            . $databaseObject->resolvedName($this)
        ;
        $columnNames = [];
        $boundValueNames = [];
        foreach($dataEntity->fieldsMarkedForUpdate() as $column)
        {
            $columnNames[] =
                $this->configuration()->openingIdentityDelimiter()
                . $column->fieldName()
                . $this->configuration()->closingIdentityDelimiter()
            ;
            $boundValueNames[] =
                $this->configuration()->writeParameterPrefix()
                . $column->fieldName()
            ;
        }
        $query .=
            '('
            . implode(', ', $columnNames)
            . ') VALUES ('
            . implode(', ', $boundValueNames)
            . ')'
        ;
        $query .= ' RETURNING *';
        return $query;
    }

    /**
     * @inheritdoc
     */
    public function generateSelectQuery(DataEntityInterface $dataEntity, DatabaseObjectInterface $databaseObject)
    {
        $query =
            'SELECT * FROM '
            . $databaseObject->resolvedName($this)
            . $this->generateWhereClauses($dataEntity)
            . $this->generateOrderByClauses($dataEntity)
            . $this->generateLockingClause($dataEntity)
            . ';'
        ;
        return $query;
    }

    /**
     * @inheritdoc
     * @throws IllegalUpdateOperationException
     */
    public function generateUpdateQuery(DataEntityInterface $dataEntity, DatabaseObjectInterface $databaseObject)
    {
        if(!$dataEntity->hasUpdatedValues())
        {
            throw new IllegalUpdateOperationException('Cannot generate an SQL UPDATE query without any updated fields');
        }

        if(!$dataEntity->hasFilteringRules())
        {
            throw new IllegalUpdateOperationException('Cannot generate an SQL UPDATE query without any filtering rules');
        }

        $query =
            'UPDATE '
            . $databaseObject->resolvedName($this)
            . ' SET '
        ;
        $updateFields = [];
        foreach($dataEntity->fieldsMarkedForUpdate() as $column)
        {
            $updateFields[] =
                $this->configuration()->openingIdentityDelimiter()
                . $column->fieldName()
                . $this->configuration()->closingIdentityDelimiter()
                . '='
                . $this->configuration()->writeParameterPrefix()
                . $column->fieldName()
            ;
        }
        $query .= implode(', ', $updateFields);
        $query .= $this->generateWhereClauses($dataEntity);
        $query .= ' RETURNING *';
        return $query;
    }
    #endregion

    #region Protected Methods
    /**
     * @inheritdoc
     * @throws Exception
     */
    protected function generateClauseFromFilterRule(DVOInterface $column, FilterRuleInterface $filterRule, string $filterIndex): string
    {
        $columnName = $this->configuration()->openingIdentityDelimiter()
            . $column->fieldName()
            . $this->configuration()->closingIdentityDelimiter()
        ;

        switch(get_class($filterRule->operator())) {
            case EqualToOperator::class:
                return ($filterRule->isNullValue())
                    ? $columnName . ' IS NULL'
                    : $columnName . '=' . $this->filterParameterName($column, $filterIndex)
                    ;
                break;
            case GreaterThanOperator::class:
                return $columnName . '>' . $this->filterParameterName($column, $filterIndex);
                break;
            case GreaterThanOrEqualToOperator::class:
                return $columnName . '>=' . $this->filterParameterName($column, $filterIndex);
                break;
            case LessThanOperator::class:
                return $columnName . '<' . $this->filterParameterName($column, $filterIndex);
                break;
            case LessThanOrEqualToOperator::class:
                return $columnName . '<=' . $this->filterParameterName($column, $filterIndex);
                break;
            case NotEqualToOperator::class:
                return ($filterRule->isNullValue())
                    ? $columnName . ' IS NOT NULL'
                    : $columnName . '!=' . $this->filterParameterName($column, $filterIndex)
                    ;
                break;
            default:
                throw new Exception('Unknown Filter Rule "' . get_class($filterRule) . '" supplied');
        }
    }

    final protected function generateLockingClause(DataEntityInterface $dataEntity): string
    {
        return $dataEntity->isLockedForUpdate() ? ' FOR UPDATE' : '';
    }

    final protected function generateSkipLockClause(DataEntityInterface $dataEntity): string
    {
        return $dataEntity->isLockedDataSkipped() ? ' SKIP LOCKED' : '';
    }
    #endregion
}
