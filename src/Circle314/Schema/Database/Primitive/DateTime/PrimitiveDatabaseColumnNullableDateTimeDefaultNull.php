<?php

namespace Circle314\Schema\Database\Primitive\DateTime;

use \DateTime;
use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateTimeDefaultNull
 * @package Circle314\Schema\Database\Primitive\DateTime
 * @method DateTime|null getValue()
 */
class PrimitiveDatabaseColumnNullableDateTimeDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableDateTimeTrait;
}