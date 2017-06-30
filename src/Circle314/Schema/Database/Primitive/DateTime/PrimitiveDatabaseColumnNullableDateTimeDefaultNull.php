<?php

namespace Circle314\Schema\Database\Primitive\DateTime;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

class PrimitiveDatabaseColumnNullableDateTimeDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableDateTimeTrait;
}