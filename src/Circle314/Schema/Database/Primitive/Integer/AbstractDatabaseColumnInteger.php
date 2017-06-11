<?php

namespace Circle314\Schema\Database\Primitive\Integer;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeIntegerTrait;

abstract class AbstractDatabaseColumnInteger extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerTrait;
}