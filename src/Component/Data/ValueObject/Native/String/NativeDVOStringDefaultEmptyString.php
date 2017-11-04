<?php

namespace Circle314\Component\Data\ValueObject\Native\String;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultEmptyStringTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeStringTrait;

/**
 * Class NativeDVOStringDefaultEmptyString
 * @package Circle314\Component\Data\ValueObject\Native\String
 * @method string getValue()
 */
class NativeDVOStringDefaultEmptyString extends AbstractDVO
{
    use DefaultEmptyStringTrait;
    use RefreshTypeStringTrait;
}