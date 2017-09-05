<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableIntegerSmallPositiveTrait;

/**
 * Class PrimitiveDatabaseColumnNullableIDSmallDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer|null getValue()
 */
class PrimitiveDatabaseColumnNullableIDSmallDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableIntegerSmallPositiveTrait;
}