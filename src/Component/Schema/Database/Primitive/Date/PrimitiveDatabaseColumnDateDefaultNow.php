<?php

namespace Circle314\Component\Schema\Database\Primitive;

use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeDateTrait;

/**
 * Class PrimitiveDatabaseColumnDateDefaultNow
 * @package Circle314\Component\Schema\Database\Primitive
 * @method DateTime getValue()
 */
class PrimitiveDatabaseColumnDateDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeDateTrait;
}