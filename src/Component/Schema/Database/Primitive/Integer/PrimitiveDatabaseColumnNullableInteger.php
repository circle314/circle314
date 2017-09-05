<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableIntegerTrait;

/**
 * Class PrimitiveDatabaseColumnNullableInteger
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer|null getValue()
 */
class PrimitiveDatabaseColumnNullableInteger extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableIntegerTrait;
}