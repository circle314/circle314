<?php

namespace Circle314\Schema\Database\Primitive\Integer;

use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeIntegerPositiveTrait;

/**
 * Class PrimitiveDatabaseColumnID
 * @package Circle314\Schema\Database\Primitive\Integer
 * @method integer getValue()
 */
class PrimitiveDatabaseColumnID extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerPositiveTrait;
}