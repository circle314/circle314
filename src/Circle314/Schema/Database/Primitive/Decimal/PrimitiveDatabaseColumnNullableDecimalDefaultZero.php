<?php

namespace Circle314\Schema\Database\Primitive\Decimal;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

class PrimitiveDatabaseColumnNullableDecimalDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeNullableDecimalTrait;
}