<?php

namespace Circle314\Collection;

/**
 * # Class AbstractCollectionItem
 * Extend this class only if you require unkeyed collection items
 *
 * @package Circle314\Collection
 * @author Kjartan Johansen <kjartan@artofwar.cc>
 * @since 0.1
 */
abstract class AbstractCollectionItem implements CollectionItemInterface
{
    #region Properties
    /** @var mixed The value for the collection item */
    protected $value;
    #endregion

    #region Constructor
    /**
     * @param mixed $value The value of the collection item
     */
    public function __construct($value)
    {
        $this->value = $value;
    }
    #endregion

    #region Magic Methods
    /**
     * # Returns a string representation of the collection item.
     * @return mixed
     */
    public function __toString()
    {
        return (string)$this->value;
    }
    #endregion
}

?>