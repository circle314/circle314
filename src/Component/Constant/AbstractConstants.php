<?php

namespace Circle314\Component\Constant;

use \ReflectionClass;

abstract class AbstractConstants
{
    #region Constructor
    final private function __construct()
    {
        // Prevents instantiation of any Constants class,
        // as this class should only ever be used statically
    }
    #endregion

    #region Public Static Methods
    /**
     * Checks whether the class has the given constant key
     *
     * @param $constantKey
     * @return bool
     * @throws \ReflectionException
     */
    public static function hasConstantKey($constantKey)
    {
        $thisClass = new ReflectionClass(static::class);
        return array_key_exists($constantKey, $thisClass->getConstants());
    }

    /**
     * Checks whether the class has the given constant value
     *
     * @param $constantValue
     * @return bool
     * @throws \ReflectionException
     */
    public static function hasConstantValue($constantValue)
    {
        $thisClass = new ReflectionClass(static::class);
        return in_array($constantValue, $thisClass->getConstants());
    }
    #endregion
}