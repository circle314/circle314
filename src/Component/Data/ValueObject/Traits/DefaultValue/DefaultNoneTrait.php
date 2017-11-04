<?php

namespace Circle314\Component\Data\ValueObject\Traits\DefaultValue;

use Circle314\Concept\Null\NullConstants;

trait DefaultNoneTrait
{
    public function getDefaultValue()
    {
        return NullConstants::NO_DEFAULT_VALUE;
    }
}