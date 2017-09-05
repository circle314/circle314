<?php

namespace Circle314\Component\Schema\Database\Primitive\DateTime;

use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnDateTime
 * @package Circle314\Component\Schema\Database\Primitive\DateTime
 * @method DateTime getValue()
 */
class PrimitiveDatabaseColumnDateTime extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeDateTimeTrait;
}