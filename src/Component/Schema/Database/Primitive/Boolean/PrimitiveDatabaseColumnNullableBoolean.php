<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnNullableBoolean
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean|null getValue()
 */
class PrimitiveDatabaseColumnNullableBoolean extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableBooleanTrait;
}