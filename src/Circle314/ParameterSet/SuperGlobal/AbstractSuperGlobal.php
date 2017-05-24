<?php

namespace Circle314\ParameterSet\SuperGlobal;

use Circle314\Collection\AbstractKeyedCollection;
use Circle314\Collection\Exception\CollectionIDNotFoundException;
use Circle314\Collection\Native\NativeKeyedCollectionItem;

abstract class AbstractSuperGlobal extends AbstractKeyedCollection {
    final public function clear()
    {
        $this->clearCollection();
    }

    /**
     * @param $key
     * @return \Circle314\Collection\KeyedCollectionItemInterface
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
     */
    final public function set($name, $value)
    {
        $this->addCollectionItem(new NativeKeyedCollectionItem($name, $value));
    }
}

?>