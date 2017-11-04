<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Data\ValueObject\Native\Integer\NativeDVONullableID;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableIntegerPositiveTrait;

/**
 * Class PrimitiveDatabaseColumnNullableID
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableID
 */
class PrimitiveDatabaseColumnNullableID extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableIntegerPositiveTrait;
}