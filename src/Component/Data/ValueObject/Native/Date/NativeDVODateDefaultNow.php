<?php

namespace Circle314\Component\Data\ValueObject\Native\Date;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeDateTrait;

/**
 * Class NativeDVODateDefaultNow
 * @package Circle314\Component\Data\ValueObject\Native
 * @method DateTime getValue()
 */
class NativeDVODateDefaultNow extends AbstractDVO
{
    use DefaultNowTrait;
    use RefreshTypeDateTrait;
}