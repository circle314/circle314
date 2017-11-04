<?php

namespace Circle314\Component\Data\ValueObject\Native\Decimal;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

/**
 * Class NativeDVONullableDecimalDefaultZero
 * @package Circle314\Component\Data\ValueObject\Native\Decimal
 * @method float|null getValue()
 */
class NativeDVONullableDecimalDefaultZero extends AbstractDVO
{
    use DefaultZeroTrait;
    use RefreshTypeNullableDecimalTrait;
}