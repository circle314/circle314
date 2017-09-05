<?php

namespace Circle314\Component\Schema\Database\Primitive\String;

use Circle314\Component\Schema\Database\AbstractDatabaseColumn;
use Circle314\Component\Schema\Traits\DefaultValue\DefaultEmptyStringTrait;
use Circle314\Component\Schema\Traits\RefreshType\RefreshTypeStringTrait;

/**
 * Class PrimitiveDatabaseColumnStringDefaultEmptyString
 * @package Circle314\Component\Schema\Database\Primitive\String
 * @method string getValue()
 */
class PrimitiveDatabaseColumnStringDefaultEmptyString extends AbstractDatabaseColumn
{
    use DefaultEmptyStringTrait;
    use RefreshTypeStringTrait;
}