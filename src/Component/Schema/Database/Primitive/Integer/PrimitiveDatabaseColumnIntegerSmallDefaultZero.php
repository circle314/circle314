<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeIntegerSmallTrait;

/**
 * Class PrimitiveDatabaseColumnIntegerSmallDefaultZero
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer getValue()
 */
class PrimitiveDatabaseColumnIntegerSmallDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeIntegerSmallTrait;
}