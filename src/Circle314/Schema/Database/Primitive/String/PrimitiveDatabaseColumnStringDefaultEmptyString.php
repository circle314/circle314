<?php

namespace Circle314\Schema\Database\Primitive\String;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultEmptyStringTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeStringTrait;

class PrimitiveDatabaseColumnStringDefaultEmptyString extends AbstractDatabaseColumn
{
    use DefaultEmptyStringTrait;
    use RefreshTypeStringTrait;
}