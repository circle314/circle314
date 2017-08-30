<?php

namespace Circle314\Schema\Database\Primitive;

use \DateTime;
use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeDateTrait;

/**
 * Class PrimitiveDatabaseColumnDateDefaultNow
 * @package Circle314\Schema\Database\Primitive
 * @method DateTime getValue()
 */
class PrimitiveDatabaseColumnDateDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeDateTrait;
}