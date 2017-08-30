<?php

namespace Circle314\Schema\Database\Primitive\DateTime;

use \DateTime;
use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnDateTimeDefaultNow
 * @package Circle314\Schema\Database\Primitive\DateTime
 * @method DateTime getValue()
 */
class PrimitiveDatabaseColumnDateTimeDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeDateTimeTrait;
}