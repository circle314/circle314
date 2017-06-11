<?php

namespace Circle314\Schema\Database\Primitive\Boolean;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

abstract class AbstractDatabaseColumnNullableBoolean extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableBooleanTrait;
}