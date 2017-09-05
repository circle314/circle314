<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableNonEmptyStringTrait;

/**
 * Class PrimitiveDatabaseColumnNullableNonEmptyStringDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string|null getValue()
 */
class PrimitiveDatabaseColumnNullableNonEmptyStringDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableNonEmptyStringTrait;
}