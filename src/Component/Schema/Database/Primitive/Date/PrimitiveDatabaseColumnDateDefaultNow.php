<?php

namespace Circle314\Component\Schema\Database\Primitive;

use Circle314\Component\Data\ValueObject\Native\Date\NativeDVODateDefaultNow;
use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeDateTrait;

/**
 * Class PrimitiveDatabaseColumnDateDefaultNow
 * @package Circle314\Component\Schema\Database\Primitive
 * @method DateTime getValue()
 * @deprecated 0.6
 * @see NativeDVODateDefaultNow
 */
class PrimitiveDatabaseColumnDateDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeDateTrait;
}