<?php

namespace Circle314\Component\Data\ValueObject\Native\Boolean;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultTrueTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeBooleanTrait;

/**
 * Class NativeDVOBooleanDefaultTrue
 * @package Circle314\Component\Data\ValueObject\Native\Boolean
 * @method boolean getValue()
 */
class NativeDVOBooleanDefaultTrue extends AbstractDVO
{
    use DefaultTrueTrait;
    use RefreshTypeBooleanTrait;
}