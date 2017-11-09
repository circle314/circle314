<?php

namespace Circle314\Component\Data\ValueObject\Traits\DefaultValue;

trait DefaultEmptyStringTrait
{
    /**
     * An empty string.
     *
     * @return string
     */
    public function getDefaultValue()
    {
        return '';
    }
}