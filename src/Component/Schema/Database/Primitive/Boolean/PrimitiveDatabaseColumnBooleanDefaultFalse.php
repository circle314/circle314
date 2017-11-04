<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Data\ValueObject\Native\Boolean\NativeDVOBooleanDefaultFalse;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultFalseTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnBooleanDefaultFalse
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean getValue()
 * @deprecated 0.6
 * @see NativeDVOBooleanDefaultFalse
 */
class PrimitiveDatabaseColumnBooleanDefaultFalse extends AbstractDatabaseColumn
{
    use DefaultFalseTrait;
    use RefreshTypeBooleanTrait;
}