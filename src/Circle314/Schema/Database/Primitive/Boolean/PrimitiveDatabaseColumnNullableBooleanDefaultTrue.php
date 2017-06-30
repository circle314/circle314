<?php

namespace Circle314\Schema\Database\Primitive\Boolean;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultTrueTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

class PrimitiveDatabaseColumnNullableBooleanDefaultTrue extends AbstractDatabaseColumn
{
    use DefaultTrueTrait;
    use RefreshTypeNullableBooleanTrait;
}