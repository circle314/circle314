<?php

namespace Circle314\Component\Data\ValueObject\Traits\DefaultValue;

trait DefaultNowTrait
{
    /**
     * The current Unix timestamp.
     *
     * @see time()
     * @return int
     */
    public function getDefaultValue()
    {
        return time();
    }
}