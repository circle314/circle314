<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Data\ValueObject\Native\Integer\NativeDVOIntegerDefaultZero;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeIntegerTrait;

/**
 * Class PrimitiveDatabaseColumnIntegerDefaultZero
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer getValue()
 * @deprecated 0.6
 * @see NativeDVOIntegerDefaultZero
 */
class PrimitiveDatabaseColumnIntegerDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeIntegerTrait;
}