<?php

namespace Circle314\Component\Data\Persistence;

abstract class PersistenceConstants
{
    #region Constants
    const BIT_READ = 1;
    const BIT_WRITE = 2;

    const READ = 'READ';
    const WRITE = 'WRITE';
    #endregion

    #region Constructor
    final private function __construct()
    {
    }
    #endregion
}