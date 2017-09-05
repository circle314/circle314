<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeIntegerTrait;

/**
 * Class PrimitiveDatabaseColumnInteger
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer getValue()
 */
class PrimitiveDatabaseColumnInteger extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerTrait;
}