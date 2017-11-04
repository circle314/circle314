<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Data\ValueObject\Native\Boolean\NativeDVOBoolean;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnBoolean
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean getValue()
 * @deprecated 0.6
 * @see NativeDVOBoolean
 */
class PrimitiveDatabaseColumnBoolean extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeBooleanTrait;
}
