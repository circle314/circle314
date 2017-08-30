<?php

namespace Circle314\Schema\Database\Primitive\DateTime;

use \DateTime;
use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateTimeDefaultNow
 * @package Circle314\Schema\Database\Primitive\DateTime
 * @method DateTime|null getValue()
 */
class PrimitiveDatabaseColumnNullableDateTimeDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeNullableDateTimeTrait;
}