<?php

namespace Circle314\Component\Data\ValueObject\Native\Date;

use \DateTime;
use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class NativeDVONullableDate
 * @package Circle314\Component\Data\ValueObject\Native
 * @method DateTime|null getValue()
 */
class NativeDVONullableDate extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDateTrait;
}