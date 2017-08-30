<?php

namespace Circle314\Schema\Database\Primitive\Boolean;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnNullableBoolean
 * @package Circle314\Schema\Database\Primitive\Boolean
 * @method boolean|null getValue()
 */
class PrimitiveDatabaseColumnNullableBoolean extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableBooleanTrait;
}