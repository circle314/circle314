<?php

namespace Circle314\Schema\Database\Primitive\DateTime;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeDateTimeTrait;

abstract class AbstractDatabaseColumnDateTime extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeDateTimeTrait;
}