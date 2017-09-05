<?php

namespace Circle314\Component\Schema\Database\Primitive;

use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateDefaultNow
 * @package Circle314\Component\Schema\Database\Primitive
 * @method DateTime|null getValue()
 */
class PrimitiveDatabaseColumnNullableDateDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeNullableDateTrait;
}