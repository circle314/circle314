<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Data\ValueObject\Native\String\NativeDVONullableStringDefaultEmptyString;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultEmptyStringTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableStringTrait;

/**
 * Class PrimitiveDatabaseColumnNullableStringDefaultEmptyString
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableStringDefaultEmptyString
 */
class PrimitiveDatabaseColumnNullableStringDefaultEmptyString extends AbstractDatabaseColumn
{
    use DefaultEmptyStringTrait;
    use RefreshTypeNullableStringTrait;
}