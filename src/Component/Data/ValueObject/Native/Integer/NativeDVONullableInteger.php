<?php

namespace Circle314\Component\Data\ValueObject\Native\Integer;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableIntegerTrait;

/**
 * Class NativeDVONullableInteger
 * @package Circle314\Component\Data\ValueObject\Native\Integer
 * @method integer|null getValue()
 */
class NativeDVONullableInteger extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeNullableIntegerTrait;
}