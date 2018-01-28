<?php

namespace Circle314\Component\Data\Persistence\Object\Database;

use Circle314\Component\Constant\AbstractConstants;

abstract class DatabaseObjectConstants extends AbstractConstants
{
    const _PARAMETERISED_VIEW = 'parameterised_view';
    const _TABLE = 'table';
    const _VIEW = 'view';

    final private function __construct() {}
}