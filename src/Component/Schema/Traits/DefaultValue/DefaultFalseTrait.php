<?php

namespace Circle314\Component\Schema\Traits\DefaultValue;

/**
 * Trait DefaultFalseTrait
 * @package Circle314\Component\Schema\Traits\DefaultValue
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultFalseTrait
 */
trait DefaultFalseTrait
{
    public function getDefaultValue()
    {
        return false;
    }
}