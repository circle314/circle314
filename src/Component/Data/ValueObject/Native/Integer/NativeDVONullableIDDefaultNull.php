<?php

namespace Circle314\Component\Data\ValueObject\Native\Integer;

use Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Data\ValueObject\Traits\RefreshType\RefreshTypeNullableIntegerPositiveTrait;

/**
 * Class NativeDVONullableIDDefaultNull
 * @package Circle314\Component\Data\ValueObject\Native\Integer
 * @method integer|null getValue()
 */
class NativeDVONullableIDDefaultNull extends NativeDVONullableID
{
    use DefaultNullTrait;
    use RefreshTypeNullableIntegerPositiveTrait;
}