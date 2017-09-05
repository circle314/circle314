<?php

namespace Circle314\Component\Schema\Database\Primitive\Decimal;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDecimalDefaultZero
 * @package Circle314\Component\Schema\Database\Primitive\Decimal
 * @method float|null getValue()
 */
class PrimitiveDatabaseColumnNullableDecimalDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeNullableDecimalTrait;
}