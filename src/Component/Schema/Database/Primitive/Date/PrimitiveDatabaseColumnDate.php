<?php

namespace Circle314\Component\Schema\Database\Primitive;

use \DateTime;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeDateTrait;

/**
 * Class PrimitiveDatabaseColumnDate
 * @package Circle314\Component\Schema\Database\Primitive
 * @method DateTime getValue()
 */
class PrimitiveDatabaseColumnDate extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeDateTrait;
}