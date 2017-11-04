<?php

namespace Circle314\Component\Data\ValueObject\Native\Boolean;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultTrueTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class NativeDVONullableBooleanDefaultTrue
 * @package Circle314\Component\Data\ValueObject\Native\Boolean
 * @method boolean|null getValue()
 */
class NativeDVONullableBooleanDefaultTrue extends AbstractDVO
{
    use DefaultTrueTrait;
    use RefreshTypeNullableBooleanTrait;
}