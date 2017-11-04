<?php

namespace Circle314\Component\Data\ValueObject\Native\String;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableStringTrait;

/**
 * Class NativeDVONullableString
 * @package Circle314\Component\Data\ValueObject\Native\String
 * @method string|null getValue()
 */
class NativeDVONullableString extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeNullableStringTrait;
}