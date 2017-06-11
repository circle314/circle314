<?php

namespace Circle314\Schema\Database\Primitive\Boolean;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultTrueTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

abstract class AbstractDatabaseColumnNullableBooleanDefaultTrue extends AbstractDatabaseColumn
{
    use DefaultTrueTrait;
    use RefreshTypeNullableBooleanTrait;
}