<?php

namespace Circle314\Component\Data\ValueObject\Native\Integer;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableIntegerTrait;

/**
 * Class NativeDVONullableIntegerDefaultZero
 * @package Circle314\Component\Data\ValueObject\Native\Integer
 * @method integer|null getValue()
 */
class NativeDVONullableIntegerDefaultZero extends AbstractDVO
{
    use DefaultZeroTrait;
    use RefreshTypeNullableIntegerTrait;
}