<?php

namespace Circle314\Component\Schema\Traits\DefaultValue;

/**
 * Trait DefaultTrueTrait
 * @package Circle314\Component\Schema\Traits\DefaultValue
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultTrueTrait
 */
trait DefaultTrueTrait
{
    public function getDefaultValue()
    {
        return true;
    }
}