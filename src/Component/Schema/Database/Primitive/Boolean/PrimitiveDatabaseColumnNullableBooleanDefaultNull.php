<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Data\ValueObject\Native\Boolean\NativeDVONullableBooleanDefaultNull;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNullTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnNullableBooleanDefaultNull
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableBooleanDefaultNull
 */
class PrimitiveDatabaseColumnNullableBooleanDefaultNull extends AbstractDatabaseColumn
{
    use DefaultNullTrait;
    use RefreshTypeNullableBooleanTrait;
}