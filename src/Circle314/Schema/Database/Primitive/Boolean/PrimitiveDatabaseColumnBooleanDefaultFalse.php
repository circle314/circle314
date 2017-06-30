<?php

namespace Circle314\Schema\Database\Primitive\Boolean;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultFalseTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeBooleanTrait;

class PrimitiveDatabaseColumnBooleanDefaultFalse extends AbstractDatabaseColumn
{
    use DefaultFalseTrait;
    use RefreshTypeBooleanTrait;
}