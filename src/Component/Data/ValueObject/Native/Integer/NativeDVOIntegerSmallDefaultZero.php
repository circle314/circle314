<?php

namespace Circle314\Component\Data\ValueObject\Native\Integer;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeIntegerSmallTrait;

/**
 * Class NativeDVOIntegerSmallDefaultZero
 * @package Circle314\Component\Data\ValueObject\Native\Integer
 * @method integer getValue()
 */
class NativeDVOIntegerSmallDefaultZero extends AbstractDVO
{
    use DefaultZeroTrait;
    use RefreshTypeIntegerSmallTrait;
}