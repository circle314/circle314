<?php

namespace Circle314\Component\Schema\Database\Primitive\DateTime;

use Circle314\Component\Data\ValueObject\Native\DateTime\NativeDVODateTimeDefaultNow;
use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNowTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnDateTimeDefaultNow
 * @package Circle314\Component\Schema\Database\Primitive\DateTime
 * @method DateTime getValue()
 * @deprecated 0.6
 * @see NativeDVODateTimeDefaultNow
 */
class PrimitiveDatabaseColumnDateTimeDefaultNow extends AbstractDatabaseColumn
{
    use DefaultNowTrait;
    use RefreshTypeDateTimeTrait;
}