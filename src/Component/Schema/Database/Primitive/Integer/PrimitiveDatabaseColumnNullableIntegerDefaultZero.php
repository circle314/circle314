<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableIntegerTrait;

/**
 * Class PrimitiveDatabaseColumnNullableIntegerDefaultZero
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer|null getValue()
 */
class PrimitiveDatabaseColumnNullableIntegerDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeNullableIntegerTrait;
}