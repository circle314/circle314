<?php

namespace Circle314\Component\Data\ValueObject\Native\Decimal;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

/**
 * Class NativeDVONullableDecimalDefaultNull
 * @package Circle314\Component\Data\ValueObject\Native\Decimal
 * @method float|null getValue()
 */
class NativeDVONullableDecimalDefaultNull extends AbstractDVO
{
    use DefaultNullTrait;
    use RefreshTypeNullableDecimalTrait;
}