<?php

namespace Circle314\Schema\Database\Primitive\String;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableStringTrait;

class PrimitiveDatabaseColumnNullableStringDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableStringTrait;
}