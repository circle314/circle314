<?php

namespace Circle314\Component\Schema\Database\Primitive\Integer;

use Circle314\Component\Data\ValueObject\Native\Integer\NativeDVOIDSmall;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeIntegerSmallPositiveTrait;

/**
 * Class PrimitiveDatabaseColumnIDSmall
 * @package Circle314\Component\Schema\Database\Primitive\Integer
 * @method integer getValue()
 * @deprecated 0.6
 * @see NativeDVOIDSmall
 */
class PrimitiveDatabaseColumnIDSmall extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeIntegerSmallPositiveTrait;
}