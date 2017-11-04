<?php

namespace Circle314\Component\Data\ValueObject\Traits\DefaultValue;

trait DefaultNowTrait
{
    public function getDefaultValue()
    {
        return time();
    }
}