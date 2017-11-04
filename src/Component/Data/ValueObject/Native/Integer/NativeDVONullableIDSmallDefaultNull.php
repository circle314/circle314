<?php

namespace Circle314\Component\Data\ValueObject\Native\Integer;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableIntegerSmallPositiveTrait;

/**
 * Class NativeDVONullableIDSmallDefaultNull
 * @package Circle314\Component\Data\ValueObject\Native\Integer
 * @method integer|null getValue()
 */
class NativeDVONullableIDSmallDefaultNull extends AbstractDVO
{
    use DefaultNullTrait;
    use RefreshTypeNullableIntegerSmallPositiveTrait;
}