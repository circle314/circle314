<?php

namespace Circle314\Component\Data\ValueObject\Native\Decimal;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeDecimalTrait;

/**
 * Class NativeDVODecimalDefaultZero
 * @package Circle314\Component\Data\ValueObject\Native\Decimal
 * @method float getValue()
 */
class NativeDVODecimalDefaultZero extends AbstractDVO
{
    use DefaultZeroTrait;
    use RefreshTypeDecimalTrait;
}