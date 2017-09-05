<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableIntegerSmallTrait;

/**
 * Class PrimitiveDatabaseColumnNullableIntegerSmallDefaultZero
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer|null getValue()
 */
class PrimitiveDatabaseColumnNullableIntegerSmallDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeNullableIntegerSmallTrait;
}