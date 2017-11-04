<?php

namespace Circle314\Component\Data\ValueObject\Native\DateTime;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeDateTimeTrait;

/**
 * Class NativeDVODateTimeDefaultNow
 * @package Circle314\Component\Data\ValueObject\Native\DateTime
 * @method DateTime getValue()
 */
class NativeDVODateTimeDefaultNow extends AbstractDVO
{
    use DefaultNowTrait;
    use RefreshTypeDateTimeTrait;
}