<?php

namespace Circle314\Component\Data\ValueObject\Native\Date;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class NativeDVONullableDateDefaultNull
 * @package Circle314\Component\Data\ValueObject\Native
 * @method DateTime|null getValue()
 */
class NativeDVONullableDateDefaultNull extends AbstractDVO
{
    use DefaultNullTrait;
    use RefreshTypeNullableDateTrait;
}