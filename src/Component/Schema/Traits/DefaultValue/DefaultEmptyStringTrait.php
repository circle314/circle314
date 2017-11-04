<?php

namespace Circle314\Component\Schema\Traits\DefaultValue;

/**
 * Trait DefaultEmptyStringTrait
 * @package Circle314\Component\Schema\Traits\DefaultValue
 * @deprecated 0.6
 * @see \Circle314\Component\Data\ValueObject\Traits\DefaultValue\DefaultEmptyStringTrait
 */
trait DefaultEmptyStringTrait
{
    public function getDefaultValue()
    {
        return '';
    }
}