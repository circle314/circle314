<?php

namespace Circle314\Component\Schema\Database\Primitive\DateTime;

use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnDateTimeDefaultNow
 * @package Circle314\Component\Schema\Database\Primitive\DateTime
 * @method DateTime getValue()
 */
class PrimitiveDatabaseColumnDateTimeDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeDateTimeTrait;
}