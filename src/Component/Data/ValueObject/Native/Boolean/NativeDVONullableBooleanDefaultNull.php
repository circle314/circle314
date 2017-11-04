<?php

namespace Circle314\Component\Data\ValueObject\Native\Boolean;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class NativeDVONullableBooleanDefaultNull
 * @package Circle314\Component\Data\ValueObject\Native\Boolean
 * @method boolean|null getValue()
 */
class NativeDVONullableBooleanDefaultNull extends AbstractDVO
{
    use DefaultNullTrait;
    use RefreshTypeNullableBooleanTrait;
}