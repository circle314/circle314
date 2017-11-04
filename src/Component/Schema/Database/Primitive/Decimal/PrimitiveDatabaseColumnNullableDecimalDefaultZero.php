<?php

namespace Circle314\Component\Schema\Database\Primitive\Decimal;

use Circle314\Component\Data\ValueObject\Native\Decimal\NativeDVONullableDecimalDefaultZero;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDecimalTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDecimalDefaultZero
 * @package Circle314\Component\Schema\Database\Primitive\Decimal
 * @method float|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableDecimalDefaultZero
 */
class PrimitiveDatabaseColumnNullableDecimalDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeNullableDecimalTrait;
}