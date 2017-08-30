<?php

namespace Circle314\Schema\Database\Primitive\Decimal;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeDecimalTrait;

/**
 * Class PrimitiveDatabaseColumnDecimal
 * @package Circle314\Schema\Database\Primitive\Decimal
 * @method float getValue()
 */
class PrimitiveDatabaseColumnDecimal extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeDecimalTrait;
}