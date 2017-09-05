<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnNullableBooleanDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean|null getValue()
 */
class PrimitiveDatabaseColumnNullableBooleanDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableBooleanTrait;
}