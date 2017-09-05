<?php

namespace Circle314\Component\Schema\Traits\DefaultValue;

use Circle314\Concept\Null\NullConstants;

trait DefaultNoneTrait
{
    public function getDefaultValue()
    {
        return NullConstants::NO_DEFAULT_VALUE;
    }
}