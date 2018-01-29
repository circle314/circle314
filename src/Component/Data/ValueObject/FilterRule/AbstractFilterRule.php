<?php

namespace Circle314\Component\Data\ValueObject\FilterRule;

use \Exception;
use Circle314\Component\Type\TypeInterface\TypeInterface;
use Circle314\Component\Data\Operator\OperatorInterface;

/**
 * Class AbstractFilterRule
 * @package Circle314\Component\Data
 * @since 0.7
 */
abstract class AbstractFilterRule implements FilterRuleInterface
{
    #region Properties
    protected $operator;
    protected $typedValue;
    #endregion

    #region Constructor
    /**
     * AbstractFilterRule constructor.
     * @param OperatorInterface $operator
     * @param $typedValue
     * @throws Exception
     */
    public function __construct(
        OperatorInterface $operator,
        ?TypeInterface $typedValue
    ) {
        if(
            $operator->acceptsNullValues() === false && (
                $typedValue === null ||
                $typedValue->getValue() === null
            )
        ) {
            throw new Exception('Attempted to create FilterRule with null value, when Operator "' . get_class($operator) . '" doesn\'t accept null values');
        }
        $this->operator = $operator;
        $this->typedValue = $typedValue;
    }
    #endregion

    #region Public Methods
    public function isNullValue(): bool
    {
        return $this->typedValue === null;
    }

    public function operator(): OperatorInterface
    {
        return $this->operator;
    }

    public function typedValue(): ?TypeInterface
    {
        return $this->typedValue;
    }
    #endregion
}