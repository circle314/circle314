<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Data\ValueObject\Native\String\NativeDVONullableNonEmptyString;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableNonEmptyStringTrait;

/**
 * Class PrimitiveDatabaseColumnNullableNonEmptyString
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableNonEmptyString
 */
class PrimitiveDatabaseColumnNullableNonEmptyString extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableNonEmptyStringTrait;
}