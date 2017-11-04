<?php

namespace Circle314\Component\Data\ValueObject\Native\String;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultEmptyStringTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableStringTrait;

/**
 * Class NativeDVONullableStringDefaultEmptyString
 * @package Circle314\Component\Data\ValueObject\Native\String
 * @method string|null getValue()
 */
class NativeDVONullableStringDefaultEmptyString extends AbstractDVO
{
    use DefaultEmptyStringTrait;
    use RefreshTypeNullableStringTrait;
}