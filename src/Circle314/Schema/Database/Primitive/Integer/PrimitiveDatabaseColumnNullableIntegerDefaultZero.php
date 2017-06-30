<?php

namespace Circle314\Schema\Database\Primitive\Integer;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableIntegerTrait;

class PrimitiveDatabaseColumnNullableIntegerDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeNullableIntegerTrait;
}