<?php

namespace Circle314\Component\Schema\Database\Primitive\Decimal;

use Circle314\Component\Data\ValueObject\Native\Decimal\NativeDVONullableDecimal;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDecimal
 * @package Circle314\Component\Schema\Database\Primitive\Decimal
 * @method float|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableDecimal
 */
class PrimitiveDatabaseColumnNullableDecimal extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDecimalTrait;
}