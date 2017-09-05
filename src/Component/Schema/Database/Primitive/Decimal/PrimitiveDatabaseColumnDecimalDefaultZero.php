<?php

namespace Circle314\Component\Schema\Database\Primitive\Decimal;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeDecimalTrait;

/**
 * Class PrimitiveDatabaseColumnDecimalDefaultZero
 * @package Circle314\Component\Schema\Database\Primitive\Decimal
 * @method float getValue()
 */
class PrimitiveDatabaseColumnDecimalDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeDecimalTrait;
}