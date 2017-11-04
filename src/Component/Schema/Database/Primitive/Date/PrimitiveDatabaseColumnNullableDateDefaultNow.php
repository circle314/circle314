<?php

namespace Circle314\Component\Schema\Database\Primitive;

use Circle314\Component\Data\ValueObject\Native\Date\NativeDVONullableDateDefaultNow;
use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateDefaultNow
 * @package Circle314\Component\Schema\Database\Primitive
 * @method DateTime|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableDateDefaultNow
 */
class PrimitiveDatabaseColumnNullableDateDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeNullableDateTrait;
}