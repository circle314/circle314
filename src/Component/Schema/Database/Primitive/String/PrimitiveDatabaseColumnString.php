<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Data\ValueObject\Native\String\NativeDVOString;
use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeStringTrait;

/**
 * Class PrimitiveDatabaseColumnString
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string getValue()
 * @deprecated 0.6
 * @see NativeDVOString
 */
class PrimitiveDatabaseColumnString extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeStringTrait;
}