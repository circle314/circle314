<?php

namespace Circle314\Component\Data\ValueObject\Native\Integer;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableIntegerSmallTrait;

/**
 * Class NativeDVONullableIntegerSmallDefaultNull
 * @package Circle314\Component\Data\ValueObject\Native\Integer
 * @method integer|null getValue()
 */
class NativeDVONullableIntegerSmallDefaultNull extends AbstractDVO
{
    use DefaultNullTrait;
    use RefreshTypeNullableIntegerSmallTrait;
}