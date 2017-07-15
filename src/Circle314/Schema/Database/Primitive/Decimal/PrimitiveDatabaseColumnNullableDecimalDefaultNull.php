<?php

namespace Circle314\Schema\Database\Primitive\Decimal;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

class PrimitiveDatabaseColumnNullableDecimalDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableDecimalTrait;
}