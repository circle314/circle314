<?php

namespace Circle314\Component\Schema\Traits\DefaultValue;

/**
 * Trait DefaultZeroTrait
 * @package Circle314\Component\Schema\Traits\DefaultValue
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultZeroTrait
 */
trait DefaultZeroTrait
{
    public function getDefaultValue()
    {
        return 0;
    }
}