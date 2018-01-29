<?php

namespace Circle314\Component\ParameterSet\SuperGlobal;

use Circle314\Component\Collection\AbstractKeyedCollection;
use Circle314\Component\Collection\Exception\CollectionIDNotFoundException;
use Circle314\Component\Collection\Native\NativeKeyedCollectionItem;

/**
 * Class AbstractSuperGlobal
 * @package Circle314\Component\ParameterSet
 * @deprecated 0.7
 */
abstract class AbstractSuperGlobal extends AbstractKeyedCollection {
    final public function clear()
    {
        $this->clearCollection();
    }

    /**
     * @param $key
     * @return \Circle314\Component\Collection\KeyedCollectionItemInterface
     */
    final public function get($key)
    {
        try {
            return $this->getID($key);
        } catch(CollectionIDNotFoundException $e) {
            return null;
        }
    }

    /**
     * @param $name
     * @param $value
     * @throws \Circle314\Component\Collection\Exception\CollectionExpectedClassMismatchException
     * @throws \Circle314\Component\Collection\Exception\CollectionItemUnidentifiableException
     */
    final public function set($name, $value)
    {
        $this->addCollectionItem(new NativeKeyedCollectionItem($name, $value));
    }
}
