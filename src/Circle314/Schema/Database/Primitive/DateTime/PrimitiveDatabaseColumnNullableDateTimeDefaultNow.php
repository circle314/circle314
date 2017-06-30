<?php

namespace Circle314\Schema\Database\Primitive\DateTime;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

class PrimitiveDatabaseColumnNullableDateTimeDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeNullableDateTimeTrait;
}