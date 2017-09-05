<?php

namespace Circle314\Component\Schema\Database\Primitive\Decimal;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDecimal
 * @package Circle314\Component\Schema\Database\Primitive\Decimal
 * @method float|null getValue()
 */
class PrimitiveDatabaseColumnNullableDecimal extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDecimalTrait;
}