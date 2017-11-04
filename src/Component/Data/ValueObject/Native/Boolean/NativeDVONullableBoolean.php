<?php

namespace Circle314\Component\Data\ValueObject\Native\Boolean;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class NativeDVONullableBoolean
 * @package Circle314\Component\Data\ValueObject\Native\Boolean
 * @method boolean|null getValue()
 */
class NativeDVONullableBoolean extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeNullableBooleanTrait;
}