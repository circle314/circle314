<?php

namespace Circle314\Schema\Database\Primitive;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

abstract class AbstractDatabaseColumnNullableDateDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeNullableDateTrait;
}