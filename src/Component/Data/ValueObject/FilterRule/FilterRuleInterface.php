<?php

namespace Circle314\Component\Data\ValueObject\FilterRule;

use Circle314\Component\Data\Operator\OperatorInterface;
use Circle314\Component\Type\TypeInterface\TypeInterface;

/**
 * Interface FilterRuleInterface
 * @package Circle314\Component\Data\ValueObject\FilterRule
 * @since 0.7
 */
interface FilterRuleInterface
{
    /**
     * Reports whether the Filter Rule value is null.
     *
     * @return bool
     * @since 0.7
     */
    public function isNullValue(): bool;

    /**
     * The operator of the Filter Rule.
     *
     * @return OperatorInterface
     * @since 0.7
     */
    public function operator(): OperatorInterface;

    /**
     * The value that is operated on.
     *
     * @return null|TypeInterface
     * @since 0.7
     */
    public function typedValue(): ?TypeInterface;
}