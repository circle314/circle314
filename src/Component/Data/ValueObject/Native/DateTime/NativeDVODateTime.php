<?php

namespace Circle314\Component\Data\ValueObject\Native\DateTime;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeDateTimeTrait;

/**
 * Class NativeDVODateTime
 * @package Circle314\Component\Data\ValueObject\Native\DateTime
 * @method DateTime getValue()
 */
class NativeDVODateTime extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeDateTimeTrait;
}