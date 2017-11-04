<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Data\ValueObject\Native\Integer\NativeDVONullableIDDefaultNull;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableIntegerPositiveTrait;

/**
 * Class PrimitiveDatabaseColumnNullableIDDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableIDDefaultNull
 */
class PrimitiveDatabaseColumnNullableIDDefaultNull extends PrimitiveDatabaseColumnNullableID
{
    use DefaultNullTrait;
    use RefreshTypeNullableIntegerPositiveTrait;
}