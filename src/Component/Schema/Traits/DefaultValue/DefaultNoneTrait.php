<?php

namespace Circle314\Component\Schema\Traits\DefaultValue;

use Circle314\Concept\Null\NullConstants;

/**
 * Trait DefaultNoneTrait
 * @package Circle314\Component\Schema\Traits\DefaultValue
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNoneTrait
 */
trait DefaultNoneTrait
{
    public function getDefaultValue()
    {
        return NullConstants::NO_DEFAULT_VALUE;
    }
}