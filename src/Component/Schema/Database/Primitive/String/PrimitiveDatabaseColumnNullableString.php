<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Data\ValueObject\Native\String\NativeDVONullableString;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableStringTrait;

/**
 * Class PrimitiveDatabaseColumnNullableString
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableString
 */
class PrimitiveDatabaseColumnNullableString extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableStringTrait;
}