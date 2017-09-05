<?php

namespace Circle314\Component\Schema\Database\Primitive\Boolean;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultFalseTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNullableBooleanTrait;

/**
 * Class PrimitiveDatabaseColumnNullableBooleanDefaultFalse
 * @package Circle314\Component\Schema\Database\Primitive\Boolean
 * @method boolean|null getValue()
 */
class PrimitiveDatabaseColumnNullableBooleanDefaultFalse extends AbstractDatabaseColumn
{
    use DefaultFalseTrait;
    use RefreshTypeNullableBooleanTrait;
}