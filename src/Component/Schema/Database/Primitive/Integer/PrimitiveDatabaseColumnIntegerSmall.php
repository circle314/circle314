<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Data\ValueObject\Native\Integer\NativeDVOIntegerSmall;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeIntegerSmallTrait;

/**
 * Class PrimitiveDatabaseColumnIntegerSmall
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer getValue()
 * @deprecated 0.6
 * @see NativeDVOIntegerSmall
 */
class PrimitiveDatabaseColumnIntegerSmall extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerSmallTrait;
}