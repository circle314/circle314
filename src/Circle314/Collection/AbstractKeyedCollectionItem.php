<?php

namespace Circle314\Collection;

/**
 * # Class AbstractKeyedCollectionItem
 * Extend this class only if you require keyed collection items
 *
 * @package Circle314\Collection
 * @author Kjartan Johansen <kjartan@artofwar.cc>
 * @since 0.1
 */
abstract class AbstractKeyedCollectionItem extends AbstractCollectionItem implements KeyedCollectionItemInterface
{
    #region Abstract Methods
    /** {@inheritdoc} */
    abstract public function ID();
    #endregion
}