<?php

namespace Circle314\Schema\Database\Primitive\Decimal;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

class PrimitiveDatabaseColumnNullableDecimal extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDecimalTrait;
}