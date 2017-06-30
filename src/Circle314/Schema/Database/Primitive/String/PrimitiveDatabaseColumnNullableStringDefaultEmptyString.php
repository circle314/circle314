<?php

namespace Circle314\Schema\Database\Primitive\String;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultEmptyStringTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableStringTrait;

class PrimitiveDatabaseColumnNullableStringDefaultEmptyString extends AbstractDatabaseColumn
{
    use DefaultEmptyStringTrait;
    use RefreshTypeNullableStringTrait;
}