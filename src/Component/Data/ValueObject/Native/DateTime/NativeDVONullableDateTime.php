<?php

namespace Circle314\Component\Data\ValueObject\Native\DateTime;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

/**
 * Class NativeDVONullableDateTime
 * @package Circle314\Component\Data\ValueObject\Native\DateTime
 * @method DateTime|null getValue()
 */
class NativeDVONullableDateTime extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDateTimeTrait;
}