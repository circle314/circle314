<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Data\ValueObject\Native\Integer\NativeDVOIntegerSmallDefaultZero;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultZeroTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeIntegerSmallTrait;

/**
 * Class PrimitiveDatabaseColumnIntegerSmallDefaultZero
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer getValue()
 * @deprecated 0.6
 * @see NativeDVOIntegerSmallDefaultZero
 */
class PrimitiveDatabaseColumnIntegerSmallDefaultZero extends AbstractDatabaseColumn
{
    use DefaultZeroTrait;
    use RefreshTypeIntegerSmallTrait;
}