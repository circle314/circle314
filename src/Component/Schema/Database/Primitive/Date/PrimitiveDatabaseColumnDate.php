<?php

namespace Circle314\Component\Schema\Database\Primitive;

use Circle314\Component\Data\ValueObject\Native\Date\NativeDVODate;
use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeDateTrait;

/**
 * Class PrimitiveDatabaseColumnDate
 * @package Circle314\Component\Schema\Database\Primitive
 * @method DateTime getValue()
 * @deprecated 0.6
 * @see NativeDVODate
 */
class PrimitiveDatabaseColumnDate extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeDateTrait;
}