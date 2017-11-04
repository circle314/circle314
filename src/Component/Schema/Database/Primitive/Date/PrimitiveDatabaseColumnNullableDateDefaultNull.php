<?php

namespace Circle314\Component\Schema\Database\Primitive;

use Circle314\Component\Data\ValueObject\Native\Date\NativeDVONullableDateDefaultNull;
use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableDateTrait;

/**
 * Class PrimitiveDatabaseColumnNullableDateDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive
 * @method DateTime|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableDateDefaultNull
 */
class PrimitiveDatabaseColumnNullableDateDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableDateTrait;
}