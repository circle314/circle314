<?php

namespace Circle314\Schema\Database\Primitive;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

class PrimitiveDatabaseColumnNullableDateDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableDateTrait;
}