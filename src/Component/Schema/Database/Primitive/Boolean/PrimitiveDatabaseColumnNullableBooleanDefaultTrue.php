<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Data\ValueObject\Native\Boolean\NativeDVONullableBooleanDefaultTrue;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultTrueTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnNullableBooleanDefaultTrue
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean|null getValue()
 * @deprecated 0.6
 * @see NativeDVONullableBooleanDefaultTrue
 */
class PrimitiveDatabaseColumnNullableBooleanDefaultTrue extends AbstractDatabaseColumn
{
    use DefaultTrueTrait;
    use RefreshTypeNullableBooleanTrait;
}