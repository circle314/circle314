<?php

namespace Circle314\Component\Data\ValueObject\Native\Boolean;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultFalseTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeBooleanTrait;

/**
 * Class NativeDVOBooleanDefaultFalse
 * @package Circle314\Component\Data\ValueObject\Native\Boolean
 * @method boolean getValue()
 */
class NativeDVOBooleanDefaultFalse extends AbstractDVO
{
    use DefaultFalseTrait;
    use RefreshTypeBooleanTrait;
}