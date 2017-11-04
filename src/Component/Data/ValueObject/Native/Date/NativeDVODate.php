<?php

namespace Circle314\Component\Data\ValueObject\Native\Date;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeDateTrait;

/**
 * Class NativeDVODate
 * @package Circle314\Component\Data\ValueObject\Native
 * @method DateTime getValue()
 */
class NativeDVODate extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeDateTrait;
}