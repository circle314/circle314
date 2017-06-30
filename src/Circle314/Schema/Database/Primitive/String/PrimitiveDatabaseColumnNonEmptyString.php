<?php

namespace Circle314\Schema\Database\Primitive\String;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNonEmptyStringTrait;

class PrimitiveDatabaseColumnNonEmptyString extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNonEmptyStringTrait;
}