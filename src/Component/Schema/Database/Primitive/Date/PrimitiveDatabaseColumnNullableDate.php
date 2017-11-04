<?php

namespace Circle314\Component\Schema\Database\Primitive;

use Circle314\Component\Data\ValueObject\Native\Date\NativeDVONullableDate;
use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDate
 * @package Circle314\Component\Schema\Database\Primitive
 * @method DateTime|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableDate
 */
class PrimitiveDatabaseColumnNullableDate extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNullableDateTrait;
}