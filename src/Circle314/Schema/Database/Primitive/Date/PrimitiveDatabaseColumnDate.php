<?php

namespace Circle314\Schema\Database\Primitive;

use \DateTime;
use Circle314\Schema\Database\AbstractDatabaseColumn;
use Circle314\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Schema\Traits\RefreshType\RefreshTypeDateTrait;

/**
 * Class PrimitiveDatabaseColumnDate
 * @package Circle314\Schema\Database\Primitive
 * @method DateTime getValue()
 */
class PrimitiveDatabaseColumnDate extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeDateTrait;
}