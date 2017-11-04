<?php

namespace Circle314\Component\Data\ValueObject\Native\String;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableStringTrait;

/**
 * Class NativeDVONullableStringDefaultNull
 * @package Circle314\Component\Data\ValueObject\Native\String
 * @method string|null getValue()
 */
class NativeDVONullableStringDefaultNull extends AbstractDVO
{
    use DefaultNullTrait;
    use RefreshTypeNullableStringTrait;
}