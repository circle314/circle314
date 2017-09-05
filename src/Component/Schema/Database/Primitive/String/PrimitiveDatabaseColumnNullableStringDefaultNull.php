<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableStringTrait;

/**
 * Class PrimitiveDatabaseColumnNullableStringDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string|null getValue()
 */
class PrimitiveDatabaseColumnNullableStringDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableStringTrait;
}