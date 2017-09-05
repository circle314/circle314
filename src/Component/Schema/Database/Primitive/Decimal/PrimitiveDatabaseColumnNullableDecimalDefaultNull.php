<?php

namespace Circle314\Component\Schema\Database\Primitive\Decimal;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDecimalDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\Decimal
 * @method float|null getValue()
 */
class PrimitiveDatabaseColumnNullableDecimalDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableDecimalTrait;
}