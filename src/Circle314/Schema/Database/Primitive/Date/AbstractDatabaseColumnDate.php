<?php

namespace Circle314\Schema\Database\Primitive;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeDateTrait;

abstract class AbstractDatabaseColumnDate extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeDateTrait;
}