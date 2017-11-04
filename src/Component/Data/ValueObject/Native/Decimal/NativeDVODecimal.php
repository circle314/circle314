<?php

namespace Circle314\Component\Data\ValueObject\Native\Decimal;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeDecimalTrait;

/**
 * Class NativeDVODecimal
 * @package Circle314\Component\Data\ValueObject\Native\Decimal
 * @method float getValue()
 */
class NativeDVODecimal extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeDecimalTrait;
}