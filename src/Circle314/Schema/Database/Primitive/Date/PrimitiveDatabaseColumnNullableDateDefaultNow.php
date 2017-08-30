<?php

namespace Circle314\Schema\Database\Primitive;

use \DateTime;
use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateDefaultNow
 * @package Circle314\Schema\Database\Primitive
 * @method DateTime|null getValue()
 */
class PrimitiveDatabaseColumnNullableDateDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeNullableDateTrait;
}