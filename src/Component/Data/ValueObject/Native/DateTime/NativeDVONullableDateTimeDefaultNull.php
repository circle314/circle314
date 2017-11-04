<?php

namespace Circle314\Component\Data\ValueObject\Native\DateTime;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

/**
 * Class NativeDVONullableDateTimeDefaultNull
 * @package Circle314\Component\Data\ValueObject\Native\DateTime
 * @method DateTime|null getValue()
 */
class NativeDVONullableDateTimeDefaultNull extends AbstractDVO
{
    use DefaultNullTrait;
    use RefreshTypeNullableDateTimeTrait;
}