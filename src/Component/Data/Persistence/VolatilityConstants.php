<?php

namespace Circle314\Component\Data\Persistence;

abstract class VolatilityConstants
{
    #region Constants
    const _IMMUTABLE = 0;
    const _STATIC = 1;
    const _DYNAMIC = 2;
    const _MERCURIAL = 3;
    const _VOLATILE = 4;
    #endregion

    #region Constructor
    final private function __construct()
    {
    }
    #endregion
}