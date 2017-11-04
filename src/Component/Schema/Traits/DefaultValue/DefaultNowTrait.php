<?php

namespace Circle314\Component\Schema\Traits\DefaultValue;

/**
 * Trait DefaultNowTrait
 * @package Circle314\Component\Schema\Traits\DefaultValue
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultNowTrait
 */
trait DefaultNowTrait
{
    public function getDefaultValue()
    {
        return time();
    }
}