<?php

namespace Circle314\Schema\Database\Primitive\Integer;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableIntegerTrait;

class PrimitiveDatabaseColumnNullableIntegerDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableIntegerTrait;
}