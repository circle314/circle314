<?php

namespace Circle314\Component\Schema\Traits\DefaultValue;

trait DefaultNowTrait
{
    public function getDefaultValue()
    {
        return time();
    }
}