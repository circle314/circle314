<?php

namespace Circle314\Component\Data\ValueObject\Native\DateTime;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

/**
 * Class NativeDVONullableDateTimeDefaultNow
 * @package Circle314\Component\Data\ValueObject\Native\DateTime
 * @method DateTime|null getValue()
 */
class NativeDVONullableDateTimeDefaultNow extends AbstractDVO
{
    use DefaultNowTrait;
    use RefreshTypeNullableDateTimeTrait;
}