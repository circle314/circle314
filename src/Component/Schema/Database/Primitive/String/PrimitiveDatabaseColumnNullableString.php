<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableStringTrait;

/**
 * Class PrimitiveDatabaseColumnNullableString
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string|null getValue()
 */
class PrimitiveDatabaseColumnNullableString extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableStringTrait;
}