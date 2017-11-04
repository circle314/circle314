<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Data\ValueObject\Native\Integer\NativeDVOID;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeIntegerPositiveTrait;

/**
 * Class PrimitiveDatabaseColumnID
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer getValue()
 * @deprecated 0.6
 * @see NativeDVOID
 */
class PrimitiveDatabaseColumnID extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerPositiveTrait;
}