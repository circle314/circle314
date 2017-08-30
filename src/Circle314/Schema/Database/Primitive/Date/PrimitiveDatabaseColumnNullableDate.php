<?php

namespace Circle314\Schema\Database\Primitive;

use \DateTime;
use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDate
 * @package Circle314\Schema\Database\Primitive
 * @method DateTime|null getValue()
 */
class PrimitiveDatabaseColumnNullableDate extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDateTrait;
}