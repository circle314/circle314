<?php

namespace Circle314\Component\Data\Persistence;

/**
 * Constants for persistence
 *
 * @package     Circle314\Concept
 * @author      Kjartan Johansen <kjartan@artofwar.cc>
 * @copyright   Copyright (c) Kjartan Johansen
 * @license     https://www.apache.org/licenses/LICENSE-2.0
 * @link        https://github.com/circle314/concept
 */
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