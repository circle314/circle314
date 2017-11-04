<?php

namespace Circle314\Component\Data\ValueObject\Native\String;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableNonEmptyStringTrait;

/**
 * Class NativeDVONullableNonEmptyStringDefaultNull
 * @package Circle314\Component\Data\ValueObject\Native\String
 * @method string|null getValue()
 */
class NativeDVONullableNonEmptyStringDefaultNull extends AbstractDVO
{
    use DefaultNullTrait;
    use RefreshTypeNullableNonEmptyStringTrait;
}