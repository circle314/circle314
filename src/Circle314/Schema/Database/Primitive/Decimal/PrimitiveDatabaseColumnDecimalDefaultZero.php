<?php

namespace Circle314\Schema\Database\Primitive\Decimal;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeDecimalTrait;

class PrimitiveDatabaseColumnDecimalDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeDecimalTrait;
}