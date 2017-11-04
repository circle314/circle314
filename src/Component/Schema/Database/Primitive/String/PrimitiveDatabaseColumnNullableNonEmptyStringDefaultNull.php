<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Data\ValueObject\Native\String\NativeDVONullableNonEmptyStringDefaultNull;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableNonEmptyStringTrait;

/**
 * Class PrimitiveDatabaseColumnNullableNonEmptyStringDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableNonEmptyStringDefaultNull
 */
class PrimitiveDatabaseColumnNullableNonEmptyStringDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableNonEmptyStringTrait;
}