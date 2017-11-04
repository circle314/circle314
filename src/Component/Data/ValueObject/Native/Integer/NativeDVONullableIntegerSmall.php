<?php

namespace Circle314\Component\Data\ValueObject\Native\Integer;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableIntegerSmallTrait;

/**
 * Class NativeDVONullableIntegerSmall
 * @package Circle314\Component\Data\ValueObject\Native\Integer
 * @method integer|null getValue()
 */
class NativeDVONullableIntegerSmall extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeNullableIntegerSmallTrait;
}