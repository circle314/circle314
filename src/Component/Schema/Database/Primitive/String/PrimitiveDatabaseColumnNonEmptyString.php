<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultNoneTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeNonEmptyStringTrait;

/**
 * Class PrimitiveDatabaseColumnNonEmptyString
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string getValue()
 */
class PrimitiveDatabaseColumnNonEmptyString extends AbstractDatabaseColumn
{
    use DefaultNoneTrait;
    use RefreshTypeNonEmptyStringTrait;
}