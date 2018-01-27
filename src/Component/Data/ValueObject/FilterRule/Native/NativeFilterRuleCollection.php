<?php

namespace Circle314\Component\Data\ValueObject\FilterRule\Native;

use Circle314\Component\Collection\Native\NativeUnkeyedCollection;
use Circle314\Component\Data\ValueObject\FilterRule\FilterRuleInterface;

/**
 * Class NativeFilterRuleCollection
 * @package Circle314\Component\Data\ValueObject\FilterRule\Native
 * @since 0.7
 * @method FilterRuleInterface next()
 */
class NativeFilterRuleCollection extends NativeUnkeyedCollection
{
    #region Constructor
    /**
     * NativeFilterRuleCollection constructor.
     * @param array $array
     */
    public function __construct(Array $array = [])
    {
        $this->setCollectionClass(FilterRuleInterface::class);
        parent::__construct($array);
    }
    #endregion
}
