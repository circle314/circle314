<?php

namespace Circle314\Component\Constant;

use \ReflectionClass;

abstract class AbstractConstants
{
    public static function hasConstant($constantValue)
    {
        $thisClass = new ReflectionClass(static::class);
        return in_array($constantValue, $thisClass->getConstants());
    }
}