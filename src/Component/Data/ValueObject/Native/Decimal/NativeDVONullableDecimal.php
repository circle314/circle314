<?php

namespace Circle314\Component\Data\ValueObject\Native\Decimal;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

/**
 * Class NativeDVONullableDecimal
 * @package Circle314\Component\Data\ValueObject\Native\Decimal
 * @method float|null getValue()
 */
class NativeDVONullableDecimal extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDecimalTrait;
}