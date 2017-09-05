<?php

namespace Circle314\Component\Schema\Database\Primitive\DateTime;

use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateTimeDefaultNow
 * @package Circle314\Component\Schema\Database\Primitive\DateTime
 * @method DateTime|null getValue()
 */
class PrimitiveDatabaseColumnNullableDateTimeDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeNullableDateTimeTrait;
}