<?php

namespace Circle314\Schema\Database\Primitive\Integer;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableIntegerPositiveTrait;

abstract class AbstractDatabaseColumnNullableID extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableIntegerPositiveTrait;
}