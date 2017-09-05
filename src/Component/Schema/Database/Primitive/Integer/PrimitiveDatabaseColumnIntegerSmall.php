<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeIntegerSmallTrait;

/**
 * Class PrimitiveDatabaseColumnIntegerSmall
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer getValue()
 */
class PrimitiveDatabaseColumnIntegerSmall extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerSmallTrait;
}