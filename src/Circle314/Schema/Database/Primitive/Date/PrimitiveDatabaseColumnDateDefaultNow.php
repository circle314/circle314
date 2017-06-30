<?php

namespace Circle314\Schema\Database\Primitive;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeDateTrait;

class PrimitiveDatabaseColumnDateDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeDateTrait;
}