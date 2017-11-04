<?php

namespace Circle314\Component\Data\ValueObject\Native\Integer;

use Circle314\Component\Data\ValueObject\AbstractDVO;
use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeIntegerTrait;

/**
 * Class NativeDVOInteger
 * @package Circle314\Component\Data\ValueObject\Native\Integer
 * @method integer getValue()
 */
class NativeDVOInteger extends AbstractDVO
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerTrait;
}