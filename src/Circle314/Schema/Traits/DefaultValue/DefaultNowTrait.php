<?php

namespace Circle314\Schema\Traits\DefaultValue;

trait DefaultNowTrait
{
    public function getDefaultValue()
    {
        return time();
    }
}