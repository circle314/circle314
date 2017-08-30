<?php

namespace Circle314\Schema\Database\Primitive\DateTime;

use \DateTime;
use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnDateTime
 * @package Circle314\Schema\Database\Primitive\DateTime
 * @method DateTime getValue()
 */
class PrimitiveDatabaseColumnDateTime extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeDateTimeTrait;
}