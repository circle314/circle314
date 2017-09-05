<?php

namespace Circle314\Component\Schema\Database\Primitive;

use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive
 * @method DateTime|null getValue()
 */
class PrimitiveDatabaseColumnNullableDateDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableDateTrait;
}