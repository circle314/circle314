<?php

namespace Circle314\Collection\Native;

use Circle314\Collection\AbstractKeyedCollectionItem;

/**
 * # Class NativeKeyedCollectionItem
 * A basic concrete keyed collection item class
 * @package Circle314\Collection
 * @author Kjartan Johansen <kjartan@artofwar.cc>
 * @see NativeKeyedCollection
 * @since 0.1
 */
class NativeKeyedCollectionItem extends AbstractKeyedCollectionItem
{
    #region Properties
    /** @var mixed */
    private $ID;
    #endregion

    /**
     * {@inheritdoc}
     * @param mixed $ID The identifier for the collection item
     */
    public function __construct($ID, $value) {
        $this->ID = $ID;
        parent::__construct($value);
    }

    /** {@inheritdoc} */
    final public function ID() {
        return $this->ID;
    }
}
