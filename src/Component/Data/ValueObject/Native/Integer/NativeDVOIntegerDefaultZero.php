<?php

namespace Circle314\Component\Data\ValueObject\Native\Integer;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeIntegerTrait;

/**
 * Class NativeDVOIntegerDefaultZero
 * @package Circle314\Component\Data\ValueObject\Native\Integer
 * @method integer getValue()
 */
class NativeDVOIntegerDefaultZero extends AbstractDVO
{
    use DefaultZeroTrait;
    use RefreshTypeIntegerTrait;
}