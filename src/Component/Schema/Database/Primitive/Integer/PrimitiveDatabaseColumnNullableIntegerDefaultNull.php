<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableIntegerTrait;

/**
 * Class PrimitiveDatabaseColumnNullableIntegerDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer|null getValue()
 */
class PrimitiveDatabaseColumnNullableIntegerDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableIntegerTrait;
}