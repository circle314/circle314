<?php

namespace Circle314\Component\Schema\Database\Primitive\Decimal;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeDecimalTrait;

/**
 * Class PrimitiveDatabaseColumnDecimal
 * @package Circle314\Component\Schema\Database\Primitive\Decimal
 * @method float getValue()
 */
class PrimitiveDatabaseColumnDecimal extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeDecimalTrait;
}