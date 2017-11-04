<?php

namespace Circle314\Component\Data\ValueObject\Native\Boolean;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeBooleanTrait;

/**
 * Class NativeDVOBoolean
 * @package Circle314\Component\Data\ValueObject\Native\Boolean
 * @method boolean getValue()
 */
class NativeDVOBoolean extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeBooleanTrait;
}
