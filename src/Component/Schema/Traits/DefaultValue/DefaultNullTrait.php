<?php

namespace Circle314\Component\Schema\Traits\DefaultValue;

/**
 * Trait DefaultNullTrait
 * @package Circle314\Component\Schema\Traits\DefaultValue
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNullTrait
 */
trait DefaultNullTrait
{
    public function getDefaultValue()
    {
        return null;
    }
}