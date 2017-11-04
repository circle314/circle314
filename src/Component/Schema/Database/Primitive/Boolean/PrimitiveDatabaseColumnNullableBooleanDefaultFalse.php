<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Data\ValueObject\Native\Boolean\NativeDVONullableBooleanDefaultFalse;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultFalseTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnNullableBooleanDefaultFalse
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableBooleanDefaultFalse
 */
class PrimitiveDatabaseColumnNullableBooleanDefaultFalse extends AbstractDatabaseColumn
{
    use DefaultFalseTrait;
    use RefreshTypeNullableBooleanTrait;
}