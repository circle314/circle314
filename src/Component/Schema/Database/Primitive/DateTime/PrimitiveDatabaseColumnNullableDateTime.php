<?php

namespace Circle314\Component\Schema\Database\Primitive\DateTime;

use Circle314\Component\Data\ValueObject\Native\DateTime\NativeDVONullableDateTime;
use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDateTimeTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateTime
 * @package Circle314\Component\Schema\Database\Primitive\DateTime
 * @method DateTime|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableDateTime
 */
class PrimitiveDatabaseColumnNullableDateTime extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDateTimeTrait;
}