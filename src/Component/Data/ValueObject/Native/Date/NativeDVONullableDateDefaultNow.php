<?php

namespace Circle314\Component\Data\ValueObject\Native\Date;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class NativeDVONullableDateDefaultNow
 * @package Circle314\Component\Data\ValueObject\Native
 * @method DateTime|null getValue()
 */
class NativeDVONullableDateDefaultNow extends AbstractDVO
{
    use DefaultNowTrait;
    use RefreshTypeNullableDateTrait;
}