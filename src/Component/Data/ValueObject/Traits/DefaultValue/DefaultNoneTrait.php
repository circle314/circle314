<?php

namespace Circle314\Component\Data\ValueObject\Traits\DefaultValue;

use Circle314\Concept\Null\NullConstants;

trait DefaultNoneTrait
{
    /**
     * NullConstants::NO_DEFAULT_VALUE.
     *
     * @see NullConstants::NO_DEFAULT_VALUE
     * @return string
     */
    public function getDefaultValue()
    {
        return NullConstants::NO_DEFAULT_VALUE;
    }
}