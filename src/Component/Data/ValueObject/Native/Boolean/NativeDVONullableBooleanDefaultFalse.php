<?php

namespace Circle314\Component\Data\ValueObject\Native\Boolean;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultFalseTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class NativeDVONullableBooleanDefaultFalse
 * @package Circle314\Component\Data\ValueObject\Native\Boolean
 * @method boolean|null getValue()
 */
class NativeDVONullableBooleanDefaultFalse extends AbstractDVO
{
    use DefaultFalseTrait;
    use RefreshTypeNullableBooleanTrait;
}