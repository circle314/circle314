<?php

namespace Circle314\Schema\Database\Primitive\Integer;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeIntegerSmallTrait;

class PrimitiveDatabaseColumnIntegerSmall extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerSmallTrait;
}