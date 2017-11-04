<?php

namespace Circle314\Component\Data\ValueObject\Native\String;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNonEmptyStringTrait;

/**
 * Class NativeDVONonEmptyString
 * @package Circle314\Component\Data\ValueObject\Native\String
 * @method string getValue()
 */
class NativeDVONonEmptyString extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeNonEmptyStringTrait;
}