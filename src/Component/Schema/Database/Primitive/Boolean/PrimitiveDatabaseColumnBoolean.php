<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnBoolean
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean getValue()
 */
class PrimitiveDatabaseColumnBoolean extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeBooleanTrait;
}
