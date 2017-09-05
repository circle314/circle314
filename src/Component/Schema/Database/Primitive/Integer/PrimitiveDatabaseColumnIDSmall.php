<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeIntegerSmallPositiveTrait;

/**
 * Class PrimitiveDatabaseColumnIDSmall
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer getValue()
 */
class PrimitiveDatabaseColumnIDSmall extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerSmallPositiveTrait;
}