<?php

namespace Circle314\Schema\Database\Primitive;

use \DateTime;
use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateDefaultNull
 * @package Circle314\Schema\Database\Primitive
 * @method DateTime|null getValue()
 */
class PrimitiveDatabaseColumnNullableDateDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableDateTrait;
}