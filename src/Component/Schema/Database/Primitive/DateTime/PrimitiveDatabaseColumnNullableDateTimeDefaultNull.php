<?php

namespace Circle314\Component\Schema\Database\Primitive\DateTime;

use Circle314\Component\Data\ValueObject\Native\DateTime\NativeDVONullableDateTimeDefaultNull;
use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateTimeDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\DateTime
 * @method DateTime|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableDateTimeDefaultNull
 */
class PrimitiveDatabaseColumnNullableDateTimeDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableDateTimeTrait;
}