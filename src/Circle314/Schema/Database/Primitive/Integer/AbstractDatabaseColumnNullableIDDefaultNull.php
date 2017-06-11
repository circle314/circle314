<?php

namespace Circle314\Schema\Database\Primitive\Integer;

use Circle314\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableIntegerPositiveTrait;

abstract class AbstractDatabaseColumnNullableIDDefaultNull extends AbstractDatabaseColumnNullableID
{
    use DefaultNullTrait;
    use RefreshTypeNullableIntegerPositiveTrait;
}