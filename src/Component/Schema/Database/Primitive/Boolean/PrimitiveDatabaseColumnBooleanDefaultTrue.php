<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultTrueTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnBooleanDefaultTrue
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean getValue()
 */
class PrimitiveDatabaseColumnBooleanDefaultTrue extends AbstractDatabaseColumn
{
    use DefaultTrueTrait;
    use RefreshTypeBooleanTrait;
}