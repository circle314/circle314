<?php

namespace Circle314\Schema\Database\Primitive;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

class PrimitiveDatabaseColumnNullableDate extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDateTrait;
}